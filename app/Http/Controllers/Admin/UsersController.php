<?php

namespace App\Http\Controllers\Admin;

use App\Enums\FileUploadPath;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidator;
use App\CLasses;
use App\User;
use Asan\PHPExcel\Excel as ExcelReader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
		$queryParams = $request->query();
		$limit = $queryParams["limit"] ?? 10;
		$search = $queryParams["search"] ?? "";
		$where = [
			["email", "like", "%$search%"]
		];

		$users = User::where($where)->paginate($limit);
        return view('admin.users.index', [
			"users" => $users,
			"limit" => $limit,
			"queryParams" => $queryParams
		]);
	}
	
	public function create(UserValidator $request)
    {
		if (!$request->validated()) {
            return redirect()->back();
        }
		$data = $request->all();
		$data['email_verified_at'] = Carbon::now()->format("Y-m-d H:i:s");
		$data['password'] = Hash::make("1");
		$data['first_change_pw_flg'] = true;
		if (isset($data['image'])) {
			$image = $data['image'];
            $imageName = "image_" . md5(time()) . "." . $image->getClientOriginalExtension();
            $image->move(FileUploadPath::IMAGE, $imageName);
            $data['image'] = $imageName;
		} else {
            $data['image'] = "default_avatar.png";
		}
		
		if ($data['role'] == UserRole::ADMIN) {
			$data['mssv'] = null;
			$data['class_id'] = null;
		}

		try {
			$data['phone'] = (string) $data['phone'];
			$user = User::create($data);
			if ($data['role'] != UserRole::ADMIN) {
				$class = Classes::find($data['class_id']);
				$class->student_number = $class->student_number + 1;
				$class->save();
			}
		} catch (\Exception $e) {
			Log::info($e);
			return redirect()->route('admin-home')->with('error', __('error'));
		}
		return redirect()->route('admin-home')->with('success', __('success'));
	}
	
	public function getCreate()
    {
        return view('admin.users.add');
	}
	
	public function getEdit($id)
    {
		$user = User::find($id);
		return view('admin.users.edit', [
			"user" => $user,
		]);
	}
	
	public function edit(UserValidator $request, $id)
    {
		Log::info('0');
		if (!$request->validated()) {
            return redirect()->back();
        }
		$data = $request->input();
		unset($data['_token']);
		if ($data['role'] == UserRole::ADMIN) {
		}
		Log::info('message0');
		try {
			$user = User::find($id);
			if ($request->file('image') != null) {
				Log::info('message1');
				$image = $request->file('image');
				$imageName = "image_" . md5(time()) . "." . $image->getClientOriginalExtension();
				$image->move(FileUploadPath::IMAGE, $imageName);
				if ($user->avatar != null) {
					File::delete(public_path('images/' . $user->avatar));
				}
				Log::info('message2');
				$user->avatar = $imageName;
			}

			Log::info('message');


			$user->name = $data['name'];
			$user->date_of_birth = $data["date_of_birth"];
			$user->address = $data["address"];
			$user->phone = $data["phone"];
			$user->role = $data["role"];
			$user->save();
		} catch (\Exception $e) {
			Log::info($e);
			return redirect()->route('admin-home')->with('error', __('error'));
		}
		return redirect()->route('admin-home')->with('edit', __('success'));
	}
	
	public function delete($id)
    {
		try {
			$user = User::find($id);
			if ($user->role == UserRole::USER) {
				$class = Classes::find($user->class_id);
				$class->student_number = $class->student_number - 1;
				$class->save();
			}
			User::destroy($id);
		} catch (\Exception $th) {
			Log::info($e);
			return redirect()->route('admin-home')->with('error', __('error'));
		}
        return redirect()->route('admin-home')->with('delete', __('success'));
	}
	
	public function detail($id)
	{
		$user = User::find($id);
		return view('admin.users.detail', [
			"user" => $user
		]);
	}

	public function getUpload()
	{
		return view('admin.users.upload');
	}

	public function postUpload(Request $request)
    {
		DB::beginTransaction();
		$excelFile = $request->file("upload_file");
		$fileName = $excelFile->getClientOriginalName();
		$excelFile->move(FileUploadPath::EXCEL, $fileName);
		$url = public_path("/excels/" . $fileName);
		$reader = ExcelReader::load($url);
		$insertData = [];
		foreach ($reader as $index => $row) {
			if ($index > 1) {
				$newData = [
					"name" => $row[1],
					"email" => $row[2],
					"mssv" => $row[3],
					"class_id" => $row[4],
					"phone" => $row[5],
					"address" => $row[6],
					"date_of_birth" => $row[7],
					"password" => Hash::make("1"),
					"role" => UserRole::USER,
					"paid_flg" => false,
					"first_change_pw_flg" => true,
					"created_at" => Carbon::now(),
					"updated_at" => Carbon::now()
				];

				$validator = Validator::make($newData, [
					'name' => 'required|max:255',
            		'email' => 'required|max:255|email|unique:users'
				]);
				if ($validator->fails()) {
					DB::rollBack();
					Log::info($validator->errors());
					return redirect()->route('user-upload')->withErrors($validator)->with('email', $newData['email']);
				}
				$insertData[] = $newData;
				$class = Classes::find($newData['class_id']);
				$class->student_number = $class->student_number + 1;
				$class->save();
			}
		}

		try {
			DB::table("users")->insert($insertData);
			DB::commit();
		} catch (\Exception $e) {
			DB::rollBack();
			Log::info($e);
			return redirect()->route('admin-home')->with('error', __('error'));
		}
		return redirect()->route('admin-home')->with('success', __('success'));
	}
}
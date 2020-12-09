<?php

namespace App\Http\Controllers\Admin;

use App\Major;
use App\Enums\CloseFlag;
use App\Enums\FileUploadPath;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\MajorValidator;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MajorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		$this->middleware('auth');
		$this->middleware(function ($request, $next) {
			$userRole = Auth::user()->role;
			if ($userRole != UserRole::ADMIN) {
				return redirect()->route("home");
			}
			return $next($request);
		});
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

        $majors = DB::table('majors')
            ->where("name", "like", "%$search%")
            ->paginate($limit);

        return view('admin.majors.index', [
            "majors" => $majors,
            "limit" => $limit,
        ]);
    }

    public function getAdd()
    {
        $major = new Major;
        return view('admin.majors.add');
    }

    public function add(MajorValidator $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if (isset($data['banner'])) {
			$image = $data['banner'];
            $imageName = "banner_" . md5(time()) . "." . $image->getClientOriginalExtension();
            $image->move(FileUploadPath::IMAGE, $imageName);
            $data['banner'] = $imageName;
        }
        try {
            $major = Major::create($data);
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('index-majors')->with('error', __('error'));
        }
        return redirect()->route('index-majors')->with('success', __('success'));
    }

    public function getEdit($id)
    {
        $major = Major::find($id);
        return view('admin.majors.edit', [
            'major' => $major,
        ]);
    }

    public function edit(MajorValidator $request, $id)
    {
        $data = $request->all();
        $major = Major::find($id);
        if (isset($data['banner'])) {
			$image = $data['banner'];
            $imageName = "banner_" . md5(time()) . "." . $image->getClientOriginalExtension();
            $image->move(FileUploadPath::IMAGE, $imageName);
            $data['banner'] = $imageName;
        }
        try {
            $major->name = $data['name'];
            $major->eng_name = $data['eng_name'];
            $major->dean = $data['dean'];
            $major->email = $data['email'];
            $major->introduction = $data['introduction'];
            $major->phone = $data['phone'];
            if (isset($data['banner'])) {
                $major->banner = $data['banner'];
            }
            $major->save();
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('index-majors')->with('error', __('error'));
        }
        return redirect()->route('index-majors')->with('edit', __('success'));
    }

    public function detail($id)
    {
        $majorDetail = Major::find($id);

        return view('admin.majors.detail', [
            "majorDetail" => $majorDetail,
        ]);
    }

    public function delete($id)
    {
        try {
            Major::destroy($id);
        } catch (\Exception $th) {
            Log::info($e);
            return redirect()->route('index-majors')->with('error', __('error'));
        }
        return redirect()->route('index-majors')->with('delete', __('success'));
    }
}
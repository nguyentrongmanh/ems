<?php

namespace App\Http\Controllers;

use App\Classes;
use App\ClassRegister;
use App\Enums\CloseFlag;
use App\Enums\FileUploadPath;
use App\Enums\UserRole;
use App\Http\Requests\UserValidator;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use App\Validator;
use Mail;
use App\Mail\ForTeacher;
use App\Mail\ForStudent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function mba()
    {
        return view('mba');
    }

    public function bacA()
    {
        return view('tba.bac-a');
    }

    public function hungNguyen()
    {
        return view('tba.hung-nguyen');
    }

    public function huy()
    {
        return view('huy');
    }
	
    public function getProfile()
    {
        $user = Auth::user();

        return view('profile', [
            "user" => $user,
        ]);
    }

    public function profile(UserValidator $request)
    {
        if (!$request->validated()) {
            return redirect()->back();
        }
        $data = $request->input();
        unset($data['_token']);
        $id = Auth::id();
        $user = User::find($id);
        try {
            if ($request->file('image') != null) {
                $image = $request->file('image');
                $imageName = "image_" . md5(time()) . "." . $image->getClientOriginalExtension();
                $image->move(FileUploadPath::IMAGE, $imageName);
                if ($user->image != null) {
                    File::delete(public_path('image/' . $user->image));
                }
                $user->image = $imageName;
            }
            $user->name = $data['name'];
            $user->age = $data["age"];
            $user->address = $data["address"];
            $user->phone = $data["phone"];
            $user->company = $data["company"];
            $user->intro = $data["intro"];
            $user->save();
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('profile')->with('error', __('error'));
        }
        return redirect()->route('profile')->with('success', __('success'));
    }

    public function getPassword()
    {
        return view('change-password');
    }

    public function changePassword(Request $request)
    {
        $request_data = $request->all();
        $validator = User::credential_rules($request_data);
        if ($validator->fails()) {
            return redirect()->route('change-password')->with('error1', __('error1'));
        } else {
            $current_password = Auth::User()->password;
            if (Hash::check($request_data['current-password'], $current_password)) {
                $userId = Auth::id();
                $user = User::find($userId);
                $user->password = Hash::make($request_data['password']);
                $user->save();
                return redirect()->route('profile')->with('success', __('success'));
            }
            return redirect()->route('change-password')->with('error2', __('error2')); 
        }
    }
}

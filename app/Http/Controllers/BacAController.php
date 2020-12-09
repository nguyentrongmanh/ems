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

class BacAController extends Controller
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
    public function tranformer()
    {
        return view('bac-a.tranformer');
    }

    public function busbarc11()
    {
        return view('bac-a.busbarc11');
    }

    public function busbarc12()
    {
        return view('bac-a.busbarc12');
    }

    public function busbarc31()
    {
        return view('bac-a.busbarc31');
    }
}

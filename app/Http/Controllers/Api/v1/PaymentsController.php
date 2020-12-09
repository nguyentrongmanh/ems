<?php

namespace App\Http\Controllers\Api\v1;

use App\Mail\ForStudent;
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
use Mail;

class PaymentsController extends Controller
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
    public function changeStatus(Request $request)
    {
        $data = $request->all();
        try {
            $user = User::find((int)$data['user_id']);
            $user->paid_flg = !$user->paid_flg;
            $user->save();
        } catch (\Exception $e) {
            Log::info($e);
			return response()->json([
				'status' => 400,
				'error' => "error"
			], 400);
		}
        return response()->json([
			'status' => 200,
			"result" => true,
		], 200);
    }
    
    public function sentMail(Request $request)
    {
        $data = $request->all();
        try {
            $user = User::find((int)$data['user_id']);
            Mail::to($user->email)->send(new ForStudent($user));
        } catch (\Exception $e) {
            Log::info($e);
			return response()->json([
				'status' => 400,
				'error' => "error"
			], 400);
		}
        return response()->json([
			'status' => 200,
			"result" => true,
		], 200);
	}
}
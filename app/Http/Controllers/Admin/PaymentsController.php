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
class PaymentsController extends Controller
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
		$class = $queryParams["class"] ?? "";
		$where = [
			["role", "=", UserRole::USER]
		];

		if ($class != "") {
			$where[] = ["class_id", "=" , $class];
        }
        
        $classes = Classes::get();
		$users = User::where($where)->paginate($limit);

		$totalPay = User::where($where)->where("paid_flg", "=", 1)->get()->count();
		$totalDontPay = User::where($where)->where("paid_flg", "=", 0)->get()->count();
		$total = $totalPay*200000;
        return view('admin.payment.index', [
            "classes" => $classes,
			"users" => $users,
			"limit" => $limit,
			"totalPay" => $totalPay,
			"totalDontPay" => $totalDontPay,
			"total" => $total,
			"classId" => $class
		]);
	}
}
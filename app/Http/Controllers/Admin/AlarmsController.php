<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\TranformerStatic;
use App\User;
use Asan\PHPExcel\Excel as ExcelReader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AlarmsController extends Controller
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
		$tranformerStatics = TranformerStatic::limit(20)->get();
        return view('admin.alarm.index', [
            "queryParams" => $queryParams,
            "tranformerStatics" => $tranformerStatics
		]);
	}
}
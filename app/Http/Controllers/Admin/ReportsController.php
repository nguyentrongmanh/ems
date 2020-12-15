<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\TranformerStatic;
use App\Statics;
use App\User;
use App\Enums\VoltageLevel;
use App\Enums\Substation;
use Asan\PHPExcel\Excel as ExcelReader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class ReportsController extends Controller
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
        $startDate = Carbon::yesterday();
        $endDate = Carbon::yesterday()->addMinutes(1410);
        if (!empty($queryParams['date_range'])) {
            $dateRangeArr = explode(" - ",$queryParams['date_range']);
            $startDate = Carbon::parse($dateRangeArr[0] . " 00:00:00");
            $endDate = Carbon::parse($dateRangeArr[1] . " 23:30:00");
        }
        $substationId = $queryParams['substation'] ?? Substation::BAC_A;

        $c11BusbarBacA = DB::table('busbars')
            ->where("voltage_level", VoltageLevel::HIGHT_VOLTAGE_110KV)
            ->where("substation", $substationId)
            ->where("label", "C11")
            ->first();
        $c12BusbarBacA = DB::table('busbars')
            ->where("voltage_level", VoltageLevel::HIGHT_VOLTAGE_110KV)
            ->where("substation", $substationId)
            ->where("label", "C12")
            ->first();
        $c31BusbarBacA = DB::table('busbars')
            ->where("voltage_level", VoltageLevel::HIGHT_VOLTAGE_35KV)
            ->where("substation", $substationId)
            ->where("label", "C31")
            ->first();

        $c11Bay = DB::table('bays')
            ->where("busbars_id", $c11BusbarBacA->id)
            ->first();
        $c12Bay = DB::table('bays')
            ->where("busbars_id", $c12BusbarBacA->id)
            ->first();
        $c31Bay = DB::table('bays')
            ->where("busbars_id", $c31BusbarBacA->id)
            ->get();
        $keyList = [];
        $tableHeader = [];
        $initData =  [
            "voltage" => 0,
            "amperage" => 0,
            "active_power" => 0,
            "reactive_power" => 0,
            "factor" => 0,
            "frequency" => 0,
            "temp" => 0 
        ];

        $keyList[$c11BusbarBacA->label] = $initData;
        $keyList[$c12BusbarBacA->label] = $initData;
        $keyList[$c31BusbarBacA->label] = $initData;
        $keyList[$c11Bay->code] = $initData;
        $keyList[$c12Bay->code] = $initData;

        $tableHeader[] = $c11BusbarBacA->label;
        $tableHeader[] = $c12BusbarBacA->label;
        $tableHeader[] = $c31BusbarBacA->label;
        $tableHeader[] = $c11Bay->code;
        $tableHeader[] = $c12Bay->code;
        
        foreach ($c31Bay as $bay) {
            $keyList[$bay->code] = $initData;
            $tableHeader[] = $bay->code;
        }

        $minTime = Carbon::now()->subDays(1);
        
        $renderData = [];
        $targetTime = $endDate;
        while (1) {
            if (!$targetTime->gte($startDate)) {
                break;
            }
            $renderData[$targetTime->toDateTimeString()] = $keyList;
            $targetTime->subMinutes(30);
        }

        $statics = Statics::where("substation", $substationId)
            ->get();
        foreach ($statics as $item) {
            foreach ($renderData as $startTime => $dataList) {
                $createdAt = Carbon::parse($item->created_at);
                if (Carbon::parse($startTime)->gte($createdAt) && Carbon::parse($startTime)->subMinutes(30)->lt($createdAt)) {
                    if ($item->bays_id != null) {
                        $bayCode = $item->bay->code;
                        $renderData[$startTime][$bayCode]['voltage'] += $item->voltage; 
                        $renderData[$startTime][$bayCode]['amperage'] += $item->voltage; 
                        $renderData[$startTime][$bayCode]['active_power'] += $item->voltage; 
                        $renderData[$startTime][$bayCode]['reactive_power'] += $item->voltage; 
                        $renderData[$startTime][$bayCode]['factor'] += $item->voltage; 
                        $renderData[$startTime][$bayCode]['frequency'] += $item->voltage; 
                        $renderData[$startTime][$bayCode]['temp'] += $item->voltage; 
                    } else if ($item->busbars_id != null) {
                        $busbar = $item->busbar->label;
                        $renderData[$startTime][$busbar]['voltage'] += $item->voltage; 
                        $renderData[$startTime][$busbar]['amperage'] += $item->voltage; 
                        $renderData[$startTime][$busbar]['active_power'] += $item->voltage; 
                        $renderData[$startTime][$busbar]['reactive_power'] += $item->voltage; 
                        $renderData[$startTime][$busbar]['factor'] += $item->voltage; 
                        $renderData[$startTime][$busbar]['frequency'] += $item->voltage; 
                        $renderData[$startTime][$busbar]['temp'] += $item->voltage; 
                    }   
                }
            }
        }

        return view('admin.reports.index', [
            "renderData" => $renderData,
            "tableHeader" => $tableHeader,
            "queryParams" => $queryParams
		]);
	}
}
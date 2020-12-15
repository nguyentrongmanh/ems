<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\VoltageLevel;
use App\Enums\Substation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BacABaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c11BusbarBacA = DB::table('busbars')
            ->where("voltage_level", VoltageLevel::HIGHT_VOLTAGE_110KV)
            ->where("substation", Substation::BAC_A)
            ->where("label", "C11")
            ->first();
        $c12BusbarBacA = DB::table('busbars')
            ->where("voltage_level", VoltageLevel::HIGHT_VOLTAGE_110KV)
            ->where("substation", Substation::BAC_A)
            ->where("label", "C12")
            ->first();
        $c31BusbarBacA = DB::table('busbars')
            ->where("voltage_level", VoltageLevel::HIGHT_VOLTAGE_35KV)
            ->where("substation", Substation::BAC_A)
            ->where("label", "C31")
            ->first();
        DB::table('bays')->insert([
            [
                "substation" => Substation::BAC_A,
                "busbars_id" => $c11BusbarBacA->id,
                "code" => "171",
                "name" => "Nghia Dan Bay",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "busbars_id" => $c12BusbarBacA->id,
                "substation" => Substation::BAC_A,
                "code" => "172",
                "name" => "Truong Banh Bay",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "busbars_id" => $c31BusbarBacA->id,
                "substation" => Substation::BAC_A,
                "code" => "371",
                "name" => "371",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "busbars_id" => $c31BusbarBacA->id,
                "substation" => Substation::BAC_A,
                "code" => "373",
                "name" => "373",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "busbars_id" => $c31BusbarBacA->id,
                "substation" => Substation::BAC_A,
                "code" => "375",
                "name" => "375",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "busbars_id" => $c31BusbarBacA->id,
                "substation" => Substation::BAC_A,
                "code" => "377",
                "name" => "377",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "busbars_id" => $c31BusbarBacA->id,
                "substation" => Substation::BAC_A,
                "code" => "379",
                "name" => "379",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "busbars_id" => $c31BusbarBacA->id,
                "substation" => Substation::BAC_A,
                "code" => "312",
                "name" => "312",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]
        ]);
    }
}

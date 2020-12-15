<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Enums\VoltageLevel;
use App\Enums\Substation;

class BusbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bacABusBar = [
            [
                "voltage_level" => VoltageLevel::HIGHT_VOLTAGE_110KV,
                "transformers_id" => 1,
                "substation" => Substation::BAC_A,
                "label" => "C11",
                "type" => 1
            ],
            [
                "voltage_level" => VoltageLevel::HIGHT_VOLTAGE_110KV,
                "transformers_id" => 1,
                "substation" => Substation::BAC_A,
                "label" => "C12",
                "type" => 1
            ],
            [
                "voltage_level" => VoltageLevel::HIGHT_VOLTAGE_35KV,
                "transformers_id" => 1,
                "substation" => Substation::BAC_A,
                "label" => "C31",
                "type" => 1
            ],
            
        ];
        DB::table('busbars')->insert($bacABusBar);

        $hungNguyenBusBar = [
            [
                "voltage_level" => VoltageLevel::HIGHT_VOLTAGE_110KV,
                "transformers_id" => 2,
                "substation" => Substation::HUNG_NGUYEN,
                "label" => "C11",
                "type" => 1
            ],
            [
                "voltage_level" => VoltageLevel::HIGHT_VOLTAGE_110KV,
                "transformers_id" => 2,
                "substation" => Substation::HUNG_NGUYEN,
                "label" => "C12",
                "type" => 1
            ],
            [
                "voltage_level" => VoltageLevel::HIGHT_VOLTAGE_35KV,
                "transformers_id" => 2,
                "substation" => Substation::HUNG_NGUYEN,
                "label" => "C31",
                "type" => 1
            ],
            [
                "voltage_level" => VoltageLevel::HIGHT_VOLTAGE_22KV,
                "transformers_id" => 2,
                "substation" => Substation::HUNG_NGUYEN,
                "label" => "C41",
                "type" => 1
            ],
            [
                "voltage_level" => VoltageLevel::HIGHT_VOLTAGE_22KV,
                "transformers_id" => 2,
                "substation" => Substation::HUNG_NGUYEN,
                "label" => "C42",
                "type" => 1
            ],
        ];
        DB::table('busbars')->insert($hungNguyenBusBar);
    }
}

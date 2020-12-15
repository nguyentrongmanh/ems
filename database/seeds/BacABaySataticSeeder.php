<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\VoltageLevel;
use App\Enums\Substation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BacABaySataticSeeder extends Seeder
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

        $c11Bay = DB::table('bays')
            ->where("busbars_id", $c11BusbarBacA->id)
            ->get();
        $c12Bay = DB::table('bays')
            ->where("busbars_id", $c12BusbarBacA->id)
            ->get();
        $c31Bay = DB::table('bays')
            ->where("busbars_id", $c31BusbarBacA->id)
            ->get();
        
        for ($i=0; $i < 100; $i++) { 
            $now = Carbon::now();
            $created = $now->subMinutes($i*8);

            foreach ($c11Bay as $bay) {
                DB::table('statics')->insert([
                    'substation' => Substation::BAC_A,
                    "bays_id" => $bay->id, 
                    "voltage" =>  110 + rand(-100,100)/100,
                    "amperage" =>  80 + rand(-100,100)/100,
                    "active_power" =>  9 + rand(-100,100)/100,
                    "reactive_power" =>  2 + rand(-100,100)/100,
                    "power" =>  10 + rand(-100,100)/100,
                    "factor" =>  0.950 + rand(-10,10)/100,
                    "frequency" =>  50 + rand(-10,10)/100,
                    "temp" =>  30.5 + rand(-100,100)/100,
                    "created_at" => $created,
                    "updated_at" => Carbon::now()
                ]);
            }

            foreach ($c12Bay as $bay) {
                DB::table('statics')->insert([
                    'substation' => Substation::BAC_A,
                    "bays_id" => $bay->id, 
                    "voltage" =>  110 + rand(-100,100)/100,
                    "amperage" =>  80 + rand(-100,100)/100,
                    "active_power" =>  9 + rand(-100,100)/100,
                    "reactive_power" =>  2 + rand(-100,100)/100,
                    "power" =>  10 + rand(-100,100)/100,
                    "factor" =>  0.950 + rand(-10,10)/100,
                    "frequency" =>  50 + rand(-10,10)/100,
                    "temp" =>  30.5 + rand(-100,100)/100,
                    "created_at" => $created,
                    "updated_at" => Carbon::now()
                ]);
            }

            foreach ($c31Bay as $bay) {
                DB::table('statics')->insert([
                    'substation' => Substation::BAC_A,
                    "bays_id" => $bay->id, 
                    "voltage" =>  35 + rand(-100,100)/100,
                    "amperage" =>  20 + rand(-100,100)/100,
                    "active_power" =>  3 + rand(-100,100)/100,
                    "reactive_power" =>  4 + rand(-100,100)/100,
                    "power" =>  5 + rand(-100,100)/100,
                    "factor" =>  0.950 + rand(-10,10)/100,
                    "frequency" =>  50 + rand(-10,10)/100,
                    "temp" =>  30.5 + rand(-100,100)/100,
                    "created_at" => $created,
                    "updated_at" => Carbon::now()
                ]);
            }

            DB::table('statics')->insert([
                'substation' => Substation::BAC_A,
                "busbars_id" => $c11BusbarBacA->id, 
                "voltage" =>  110 + rand(-100,100)/100,
                "amperage" =>  80 + rand(-100,100)/100,
                "active_power" =>  9 + rand(-100,100)/100,
                "reactive_power" =>  2 + rand(-100,100)/100,
                "power" =>  10 + rand(-100,100)/100,
                "factor" =>  0.950 + rand(-10,10)/100,
                "frequency" =>  50 + rand(-10,10)/100,
                "temp" =>  30.5 + rand(-100,100)/100,
                "created_at" => $created,
                "updated_at" => Carbon::now()
            ]);
            DB::table('statics')->insert([
                'substation' => Substation::BAC_A,
                "busbars_id" => $c12BusbarBacA->id, 
                "voltage" =>  110 + rand(-100,100)/100,
                "amperage" =>  80 + rand(-100,100)/100,
                "active_power" =>  9 + rand(-100,100)/100,
                "reactive_power" =>  2 + rand(-100,100)/100,
                "power" =>  10 + rand(-100,100)/100,
                "factor" =>  0.950 + rand(-10,10)/100,
                "frequency" =>  50 + rand(-10,10)/100,
                "temp" =>  30.5 + rand(-100,100)/100,
                "created_at" => $created,
                "updated_at" => Carbon::now()
            ]);
            DB::table('statics')->insert([
                'substation' => Substation::BAC_A,
                "busbars_id" => $c31BusbarBacA->id, 
                "voltage" =>  35 + rand(-100,100)/100,
                "amperage" =>  20 + rand(-100,100)/100,
                "active_power" =>  3 + rand(-100,100)/100,
                "reactive_power" =>  4 + rand(-100,100)/100,
                "power" =>  5 + rand(-100,100)/100,
                "factor" =>  0.950 + rand(-10,10)/100,
                "frequency" =>  50 + rand(-10,10)/100,
                "temp" =>  30.5 + rand(-100,100)/100,
                "created_at" => $created,
                "updated_at" => Carbon::now()
            ]);
        }
    }
}

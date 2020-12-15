<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TranformerStaticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        for ($i=0; $i < 50000; $i++) { 
            DB::table('tranformer_statics')->insert([
                'substation' => 1,
                'tranformer_id' => 1,
                "phase_a_voltage" =>  110 + rand(-100,100)/100,
                "phase_b_voltage" =>  35 + rand(-100,100)/100,
                "phase_c_voltage" =>  22 + rand(-100,100)/100,
                "phase_a_amperage" =>  99 + rand(-100,100)/100,
                "phase_b_amperage" =>  157 + rand(-100,100)/100,
                "phase_c_amperage" =>  243 + rand(-100,100)/100,
                "phase_a_active_power" =>  18 + rand(-100,100)/100,
                "phase_b_active_power" =>  9 + rand(-100,100)/100,
                "phase_c_active_power" =>  9 + rand(-100,100)/100,
                "phase_a_reactive_power" =>  5.91 + rand(-100,100)/100,
                "phase_b_reactive_power" =>  3 + rand(-100,100)/100,
                "phase_c_reactive_power" =>  2.94 + rand(-100,100)/100,
                "phase_a_power" =>  20 + rand(-100,100)/100,
                "phase_b_power" =>  10 + rand(-100,100)/100,
                "phase_c_power" =>  9.50 + rand(-100,100)/100,
                "phase_a_factor" =>  0.950 + rand(-10,10)/100,
                "phase_b_factor" =>  0.950 + rand(-10,10)/100,
                "phase_c_factor" =>  0.950 + rand(-10,10)/100,
                "phase_a_frequency" =>  50 + rand(-10,10)/100,
                "phase_b_frequency" =>  50 + rand(-10,10)/100,
                "phase_c_frequency" =>  50 + rand(-10,10)/100,
                "phase_a_temp" =>  30.5 + rand(-100,100)/100,
                "phase_b_temp" =>  30.5 + rand(-100,100)/100,
                "phase_c_temp" =>  30.5 + rand(-100,100)/100,
                "oil_temp" => 40 + rand(-100,100)/100,
                "created_at" => Carbon::now()->subMinutes($i*8),
                "updated_at" => Carbon::now()
            ]);
        }
    }
}

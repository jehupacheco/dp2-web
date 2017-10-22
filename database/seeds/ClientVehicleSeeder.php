<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClientVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_vehicle')->insert([
            'client_id' => 1,
            'vehicle_id' => 1,
            'starts_at' => Carbon::now(),
            'finishes_at' => Carbon::create(2100, 1, 1, 0, 0, 0),
        ]);
    }
}

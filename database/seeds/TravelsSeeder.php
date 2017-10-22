<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TravelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('travels')->insert([
            'started_at' => Carbon::now(),
            'client_id' => 1,
            'vehicle_id' => 1,
        ]);
    }
}

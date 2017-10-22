<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SensorsSeeder::class);
        $this->call(OrganizationsSeeder::class);
        $this->call(ClientsSeeder::class);
        $this->call(VehiclesSeeder::class);
        $this->call(ClientVehicleSeeder::class);
        $this->call(TravelsSeeder::class);
    }
}

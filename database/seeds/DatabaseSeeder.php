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
        $this->call(ParametersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
    }
}

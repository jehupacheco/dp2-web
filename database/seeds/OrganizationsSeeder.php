<?php

use Illuminate\Database\Seeder;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'name' => 'Negocio 1',
            'address' => 'Av. Siempreviva 742',
            'phone' => '98923689',
        ]);

        DB::table('organizations')->insert([
            'name' => 'Negocio 2',
            'address' => 'Av. Siempreviva 743',
            'phone' => '98946689',
        ]);
    }
}

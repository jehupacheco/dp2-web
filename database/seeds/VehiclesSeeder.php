<?php

use Illuminate\Database\Seeder;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            'mac' => 'FF:FF:FF:FF:FF:FF',
            'organization_id' => 1,
            'plate' => 'AER-122',
            'description' => 'Test auto 1',
        ]);

        DB::table('vehicles')->insert([
            'mac' => 'EE:FF:EE:FF:EE:FF',
            'organization_id' => 1,
            'plate' => 'PXO-789',
            'description' => 'Test auto 2',
        ]);
    }
}

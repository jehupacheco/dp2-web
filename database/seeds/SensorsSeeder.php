<?php

use Illuminate\Database\Seeder;

class SensorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensors')->insert([
            'slug' => 'weight',
            'unit' => 'g',
            'code' => 'F01',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'heart',
            'unit' => '',
            'code' => 'F02',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'nearness',
            'unit' => '',
            'code' => 'F03',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'temperature',
            'unit' => 'C',
            'code' => 'F04',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'speed',
            'unit' => 'kmh',
            'code' => 'F05',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'battery',
            'unit' => '',
            'code' => 'F06',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'humidity',
            'unit' => '',
            'code' => 'F07',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'position',
            'unit' => '',
            'code' => 'F08',
        ]);
    }
}

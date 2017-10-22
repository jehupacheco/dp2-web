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
        ]);

        DB::table('sensors')->insert([
            'slug' => 'heart',
            'unit' => '',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'nearness',
            'unit' => '',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'temperature',
            'unit' => 'C',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'speed',
            'unit' => 'kmh',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'battery',
            'unit' => '',
        ]);

        DB::table('sensors')->insert([
            'slug' => 'position',
            'unit' => '',
        ]);
    }
}

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
            'description' => 'Peso'
        ]);

        DB::table('sensors')->insert([
            'slug' => 'heart',
            'unit' => '',
            'code' => 'F02',
            'description' => 'Ritmo Cardiaco'
        ]);

        DB::table('sensors')->insert([
            'slug' => 'nearness',
            'unit' => '',
            'code' => 'F03',
            'description' => 'Proximidad'
        ]);

        DB::table('sensors')->insert([
            'slug' => 'temperature',
            'unit' => 'C',
            'code' => 'F04',
            'description' => 'Temperatura'
        ]);

        DB::table('sensors')->insert([
            'slug' => 'speed',
            'unit' => 'kmh',
            'code' => 'F05',
            'description' => 'Velocidad'
        ]);

        DB::table('sensors')->insert([
            'slug' => 'battery',
            'unit' => '',
            'code' => 'F06',
            'description' => 'Bateria'
        ]);

        DB::table('sensors')->insert([
            'slug' => 'humidity',
            'unit' => '',
            'code' => 'F07',
            'description' => 'Humedad'
        ]);

        DB::table('sensors')->insert([
            'slug' => 'iluminity',
            'unit' => 'lux',
            'code' => 'F09',
            'description' => 'Luminosidad'
        ]);

        DB::table('sensors')->insert([
            'slug' => 'uv',
            'unit' => 'uv',
            'code' => 'F10',
            'description' => 'UV'
        ]);

        DB::table('sensors')->insert([
            'slug' => 'angle',
            'unit' => '°',
            'code' => 'F11',
            'description' => 'Angulo'
        ]);

        DB::table('sensors')->insert([
            'slug' => 'infractions',
            'unit' => '',
            'code' => 'F12',
            'description' => 'Infracciones'
        ]);
    }
}

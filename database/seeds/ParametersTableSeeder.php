<?php

use Illuminate\Database\Seeder;
use App\Models\Configuration;
use Carbon\Carbon;

class ParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Configuration::insert([ 'type' => '1', 
        //                      	'organization_id' => '1',
        //                      	'value' => '3', 
        //                      	'description' => 'Es el número de días en que se requerirá el cambio de contraseña a los usuarios de la organización', 
        //                      	'created_at' => Carbon::now(),
        //                      	'updated_at' => Carbon::now(),
        //                 ]);

        DB::table('parameters')->insert([
           'type' => '1', 
            'organization_id' => '1',
            'value' => '3', 
            'description' => 'Es el número de días en que se requerirá el cambio de contraseña a los usuarios de la organización', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parameters')->insert([
           'type' => '1', 
            'organization_id' => '2',
            'value' => '3', 
            'description' => 'Es el número de días en que se requerirá el cambio de contraseña a los usuarios de la organización', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parameters')->insert([
           'type' => '1', 
            'organization_id' => '3',
            'value' => '3', 
            'description' => 'Es el número de días en que se requerirá el cambio de contraseña a los usuarios de la organización', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parameters')->insert([
           'type' => '1', 
            'organization_id' => '4',
            'value' => '3', 
            'description' => 'Es el número de días en que se requerirá el cambio de contraseña a los usuarios de la organización', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parameters')->insert([
           'type' => '1', 
            'organization_id' => '5',
            'value' => '3', 
            'description' => 'Es el número de días en que se requerirá el cambio de contraseña a los usuarios de la organización', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parameters')->insert([
           'type' => '1', 
            'organization_id' => '6',
            'value' => '3', 
            'description' => 'Es el número de días en que se requerirá el cambio de contraseña a los usuarios de la organización', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('parameters')->insert([
           'type' => '2', 
            'organization_id' => '1',
            'value' => '5000', 
            'description' => 'Es la cantidad de kilómetros que recorrerá el vehículo para que sea necesario darle mantenimiento', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parameters')->insert([
           'type' => '2', 
            'organization_id' => '2',
            'value' => '5000', 
            'description' => 'Es la cantidad de kilómetros que recorrerá el vehículo para que sea necesario darle mantenimiento', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parameters')->insert([
           'type' => '2', 
            'organization_id' => '3',
            'value' => '5000', 
            'description' => 'Es la cantidad de kilómetros que recorrerá el vehículo para que sea necesario darle mantenimiento', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parameters')->insert([
           'type' => '2', 
            'organization_id' => '4',
            'value' => '5000', 
            'description' => 'Es la cantidad de kilómetros que recorrerá el vehículo para que sea necesario darle mantenimiento', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parameters')->insert([
           'type' => '2', 
            'organization_id' => '5',
            'value' => '5000', 
            'description' => 'Es la cantidad de kilómetros que recorrerá el vehículo para que sea necesario darle mantenimiento', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parameters')->insert([
           'type' => '2', 
            'organization_id' => '6',
            'value' => '5000', 
            'description' => 'Es la cantidad de kilómetros que recorrerá el vehículo para que sea necesario darle mantenimiento', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

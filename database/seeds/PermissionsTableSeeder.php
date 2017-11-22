<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
           'name' => 'Dashboard', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Organizaciones', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Clientes', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Vehículos', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Alquileres', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Reportes-Recorridos', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Reportes-Clientes', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Reportes-Sensores', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Reportes-Historial-Alertas', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Seguridad', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Configuración', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Estacionamiento', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

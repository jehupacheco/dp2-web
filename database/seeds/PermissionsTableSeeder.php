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
           'name' => 'Vehículos para pacientes de Cardiopatía', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Vehículos para la Jardinería', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Vehículos para Ventas', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Vehículos Eco-amigables', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Vehículos para Trasporte Urbano 1', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Vehículos para Trasporte Urbano 2', 
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
           'name' => 'Reportes de Recorridos', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Reportes de Clientes', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Reportes de Sensores', 
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('permissions')->insert([
           'name' => 'Reportes de Historial de Alertas', 
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

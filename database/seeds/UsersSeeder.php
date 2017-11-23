<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'César Alberto Olivera Cokan ',
            'email' => 'cesar.olivera.cokan@gmail.com',
            'password' => bcrypt('123456'),    
            'organization_id' => 1,
            'password_updated_at'=> Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'Administrador General',
            'guard_name' => 'web', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('role_has_permissions')->insert([
            'permission_id' => 1,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 2,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 3,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 4,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 5,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 6,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 7,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 8,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 9,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 10,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 11,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 12,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 13,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 14,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 15,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 16,
            'role_id' => 1, 
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => 17,
            'role_id' => 1, 
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_id' => 1, 
            'model_type' => 'App\Models\User', 
        ]);
    }
}

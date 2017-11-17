<?php

use Illuminate\Database\Seeder;
use Carbon/Carbon;

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
            'name' => 'Usuario 1',
            'email' => 'usuario@test.com',
            'password' => bcrypt('secret'),    
            'organization_id' => 1,
            'password_updated_at'=> Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Usuario 2',
            'email' => 'usuario2@test.com',
            'password' => bcrypt('secret'),
            'organization_id' => 1,
            'password_updated_at'=> Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Usuario 3',
            'email' => 'usuario3@test.com',
            'password' => bcrypt('secret'),
            'organization_id' => 2,
            'password_updated_at'=> Carbon::now(),
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('clients')->insert([
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('clients')->insert([
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}

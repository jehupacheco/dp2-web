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
            'email' => 'test@test.com',
            'password' => bcrypt('secret'),
            'organization_id' => 1,
            'name' => 'Test Client 1',
            'lastname' => 'Test',
            'phone' => '920146721',
        ]);

        DB::table('clients')->insert([
            'email' => 'test2@test.com',
            'password' => bcrypt('secret'),
            'organization_id' => 1,
            'name' => 'Test Client 2',
            'lastname' => 'Test',
            'phone' => '920146728',
        ]);
    }
}

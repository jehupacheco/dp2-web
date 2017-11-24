<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Cardiopatia', 'Jardineria', 'Ventas', 'Eco-amigable', 'Transporte Urbano 1', 'Transporte Urbano 2'];
        $slugs = ['health', 'garden', 'sales', 'eco', 'transport1', 'transport2'];

        for ($i = 0; $i < count($names); $i++) {
            $org = factory(App\Models\Organization::class)->create([
                'name' => $names[$i],
                'slug' => $slugs[$i],
            ]);

            // Clients
            $clients = factory(App\Models\Client::class, 10)->make()
            ->each(function ($client) use ($org) {
                $org->clients()->save($client);

                $vehicles = factory(App\Models\Vehicle::class, 4)->make()
                ->each(function ($vehicle) use ($org, $client) {
                    $org->vehicles()->save($vehicle);
                    $renting = factory(App\Models\Renting::class)->make();

                    $vehicle->rentings()->save($renting);
                    $client->rentings()->save($renting);
                });
            });
        }

        $org = factory(App\Models\Organization::class)->create([
            'name' => 'Estacionamiento',
            'slug' => 'parking',
            'is_parking' => true,
        ]);

        $clients = factory(App\Models\Client::class, 10)->make()
        ->each(function ($client) use ($org) {
            $faker = Faker\Factory::create();
            $org->clients()->save($client);

            $vehicles = factory(App\Models\Vehicle::class, 4)->make([
                'mac' => $faker->ipv4,
                'plate' => '',
                'price' => 0,
            ])
            ->each(function ($vehicle) use ($org, $client) {
                $org->vehicles()->save($vehicle);
                $renting = factory(App\Models\Renting::class)->make();

                $vehicle->rentings()->save($renting);
                $client->rentings()->save($renting);
            });
        });
    }
}

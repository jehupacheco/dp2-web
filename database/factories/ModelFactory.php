<?php

use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Vehicle::class, function (Faker\Generator $faker) {
    return [
        'mac' => $faker->macAddress,
        'organization_id' => rand(1,6),
        'plate' => strtoupper(str_random(3)).'-'.strtoupper(str_random(3)),
        'description' => $faker->text,
        'price' => rand(30,50),
    ];
});

$factory->define(App\Models\Organization::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'slug' => $faker->slug,
    ];
});

$factory->define(App\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'password' => bcrypt('secret'),
        'organization_id' => rand(1,6),
        'name' => $faker->firstname,
        'lastname' => $faker->lastname,
        'phone' => $faker->phoneNumber,
    ];
});

$factory->define(App\Models\Renting::class, function (Faker\Generator $faker) {
    return [
        'client_id' => 1,
        'vehicle_id' => 1,
        'starts_at' => Carbon::now(),
        'finishes_at' => Carbon::now(),
        'delivered_at' => function (array $renting) {
            return $renting['starts_at'];
        },
        'returned_at' => function (array $renting) {
            return $renting['finishes_at'];
        },
    ];
});

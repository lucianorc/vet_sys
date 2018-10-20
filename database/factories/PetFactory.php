<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Pet::class, function (Faker $faker) {
    $users = App\Models\Customer::pluck('id')->toArray();

    return [
        'name' => $faker->name,
        'specie' => $faker->randomElement(Config::get('enums.species')),
        'race' => 'randomRace',
        'customer_id' => $faker->randomElement($users)
    ];
});

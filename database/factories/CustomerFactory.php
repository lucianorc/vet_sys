<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'birthday' => $faker->date('Y-m-d', 'now'),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber
    ];
});

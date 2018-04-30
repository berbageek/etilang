<?php

use Faker\Generator as Faker;

$factory->define(App\Violation::class, function (Faker $faker) {
    return [
        'violator_identity_number' => $faker->phoneNumber,
        'violator_name' => $faker->name,
        'officer_id' => 1,
        'station_id' => 1,
        'status' => 'NEW',
    ];
});

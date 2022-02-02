<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quote;
use Faker\Generator as Faker;

$factory->define(Quote::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->e164PhoneNumber,
        'city' => $faker->city,
        'features' => $faker->shuffle(array(1, 2, 3)),
        'services' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true) ,
        'project_link' => $faker->unique()->safeEmail ,
        'budget' => $faker->numberBetween($min = 15000, $max = 10000),
        'status' => $faker->numberBetween($min = 1, $max = 3),
    ];
});

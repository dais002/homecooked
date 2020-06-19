<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'logo' => $faker->imageUrl($width = 360, $height = 280),
        'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});

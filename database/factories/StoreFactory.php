<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'logo' => $faker->imageUrl($width = 200, $height = 200),
        'cuisine_id' => $faker->randomDigitNot(0)
    ];
});

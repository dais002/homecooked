<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween($min = 500, $max = 20000),
        'image' => $faker->imageUrl($width = 200, $height = 200),
        'limit' => $faker->numberBetween($min = 5, $max = 50),
        'store_id' => $faker->randomDigitNot(0),
    ];
});

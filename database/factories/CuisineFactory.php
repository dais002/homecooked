<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cuisine;
use Faker\Generator as Faker;

$factory->define(Cuisine::class, function (Faker $faker) {
    return [
        'type' => $faker->word,
    ];
});

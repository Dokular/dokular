<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'img' => $faker->imageUrl(640,480),
        'price' => $faker->numberBetween(2500, 5000)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Vehicle;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {
    return [
        'category_id' => Category::inRandomOrder()->value('id'),
        'name' => $faker->name,
    ];
});

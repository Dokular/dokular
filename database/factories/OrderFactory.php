<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;
use App\Models\Product;
use App\Models\Owner;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'owner_id' => Owner::inRandomOrder()->value('id'),
        'product_id' => Product::inRandomOrder()->value('id'),
        'price' => $faker->randomNumber(4),
        'status' => 'pending'
    ];
});

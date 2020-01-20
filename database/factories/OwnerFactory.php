<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Owner;
use App\Http\Resources\User;
use Faker\Generator as Faker;

$factory->define(Owner::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->value('id'),
        'transaction' => $faker->randomNumber(10),
        'name' => $faker->name,
        'car' => $faker->name,
        'identity' => $faker->randomNumber(9),
        'status' => 'pending',
    ];
});

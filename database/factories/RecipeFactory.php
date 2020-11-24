<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipe;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(5),
        'user_id' => $faker-> numberBetween(1,5),
        'rating' => 0,
        'category_id' => $faker->numberBetween(1,8),
    ];
});

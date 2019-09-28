<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Posts;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'content'=>$faker->sentence(),
        'user_id'=>$faker->randomDigit()
    ];
});

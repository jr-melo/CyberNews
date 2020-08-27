<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\news;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(news::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase(),
        'Autor' => 2,
        /* 'category_id' => 1, */
        'date' => now(),
        'body'=>$faker->text(),
        'field_status' => 1, 
        'created_at' => now(),
    ];
});

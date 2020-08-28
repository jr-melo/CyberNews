<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\news;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(news::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase(),
        'body'=>$faker->paragraph(10) . $faker->paragraph(5) . $faker->paragraph(4) . $faker->paragraph(8),
        'Autor' => 2,
        'category_id' => 5,
        /* 'date' => now(), */
        'field_status' => 1, 
        'created_at' => now(),
    ];
});

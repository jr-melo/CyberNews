<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\categorys;
use Faker\Generator as Faker;

$factory->define(categorys::class, function (Faker $faker) {
    return [
        'nombre' => $faker->userName,
        'descripcion' => $faker->sentence()
    ];
});

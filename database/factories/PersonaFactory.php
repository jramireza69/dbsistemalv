<?php

use Faker\Generator as Faker;
use App\Persona;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->name,
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curso;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text($maxNbChars = 30),
        'descripcion' => $faker->text($maxNbChars = 50),
        'duracion' => '',
        'fecha_inicio' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'precio' => $faker->numberBetween($min = 1000, $max = 5000)
    ];
});

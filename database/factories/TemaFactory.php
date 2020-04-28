<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tema;
use Faker\Generator as Faker;

$factory->define(Tema::class, function (Faker $faker) {
    return [
        'numero_tema' => $faker->numberBetween($min = 1, $max = 10),
        'nombre' => $faker->text($maxNbChars = 30),
        'descripcion' => $faker->text($maxNbChars = 100),
        'archivo' => $faker->text($maxNbChars = 100),
    ];
});

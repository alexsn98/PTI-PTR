<?php

use Faker\Generator as Faker;

$factory->define(App\Sala::class, function (Faker $faker) {
    return [
        'edificio' => $faker->numberBetween(1, 6),
        'piso' => $faker->numberBetween(1, 5),
        'num_sala' => $faker->numberBetween(1, 24),
        'num_lugares' => $faker->numberBetween(1, 65),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Docente::class, function (Faker $faker) {
    return [
        'utilizador_id' => $faker->unique()->numberBetween(21, 80),
        'numero' => $faker->unique()->numberBetween(21, 80),
        'inicio_horario_duvidas' => $faker->time(21, 'now'),
        'fim_horario_duvidas' => $faker->time(21, 'now'),
        'dia_semana_horario_duvidas' => $faker->numberBetween(1, 5),
        'gabinete' => $faker->numberBetween(1, App\Admistrador::count()),
    ];
});

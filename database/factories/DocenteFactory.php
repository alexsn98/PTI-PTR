<?php

use Faker\Generator as Faker;

$factory->define(App\Docente::class, function (Faker $faker) {
    $inicioHorario = [
        '10:00:00',
        '10:30:00',
        '11:00:00',
        '11:30:00',
        '12:00:00',
        '12:30:00',
        '13:00:00',
        '13:30:00',
        '14:00:00',
        '14:30:00',
        '15:00:00',
        '15:30:00',
        '16:00:00',
        '16:30:00',
        '17:00:00',][$faker->numberBetween(0, 14)];

    
    $inicioHorarioArray = explode(':', $inicioHorario);

    $fimHorario = ($inicioHorarioArray[0] + 1) . $inicioHorarioArray[1] . $inicioHorarioArray[2];

    return [
        'utilizador_id' => $faker->unique()->numberBetween(App\Admistrador::count(), App\Admistrador::count()+60),
        'numero' => $faker->unique()->numberBetween(50000, 60000),
        'inicio_horario_duvidas' => $inicioHorario,
        'fim_horario_duvidas' => $fimHorario,
        'dia_semana_horario_duvidas' => $faker->numberBetween(1, 5),
        'gabinete' => $faker->numberBetween(1, App\Sala::count()),
    ];
});

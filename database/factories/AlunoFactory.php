<?php

use Faker\Generator as Faker;

$factory->define(App\Aluno::class, function (Faker $faker) {
    return [
        'utilizador_id' => $faker->unique()->numberBetween(1, App\Utilizador::count()),
        'curso' => $faker->numberBetween(1, App\Utilizador::count()),
        // 'numero' => $faker->randomNumber()
        'remember_token' => Str::random(10),
    ];
});

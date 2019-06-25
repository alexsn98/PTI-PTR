<?php

use Faker\Generator as Faker;

$factory->define(App\Admistrador::class, function (Faker $faker) {
    return [
        'utilizador_id' => $faker->unique()->numberBetween(1, 20),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Curso::class, function (Faker $faker) {
    $cursosNomes = [
        'Biologia',
        'Bioquímica',
        'Ciências da Saude',
        'Engenharia Geospacial',
        'Engenharia Informatica',
        'Estatística Aplicada',
        'Fisica',
        'Geologia',
        'Matemática',
        'Matemática Aplicada',
        'Meteorologia, Oceanografia e Geofísica',
        'Química',
        'Química Tecnológica',
        'Tecnologias de Informação',
        'Engenharia Biomédica e Biofísica',
        'Engenharia da Energia e do Ambiente',
        'Engenharia Física'
    ]; //17 cursos

    return [
        'coordenador_id' => $faker->unique()->numberBetween(1, 60),
        'nome' => $cursosNomes[$faker->unique()->numberBetween(0, 16)],
        'ano_letivo' => '2018-2019'
    ];
});

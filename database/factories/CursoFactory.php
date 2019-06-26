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
        'Engenharia Física',
        'Bioestatística',
        'Bioinformática e Biologia Computacional',
        'Biologia da Conservação',
        'Biologia dos Recursos Vegetais',
        'Biologia Evolutiva e do Desenvolvimento',
        'Biologia Humana e Ambiente',
        'Biologia Molecular e Genética',
        'Bioquímica',
        'Ciência Cognitiva',
        'Ciência de Dados',
        'Ciências do Mar',
        'Ciências Geofísicas',
        'Cultura Científica e Divulgação das Ciências',
        'Ecologia e Gestão Ambiental',
        'Ecologia Marinha',
        'Engenharia Geoespacial',
        'Engenharia Informática',
        'Ensino de Biologia e Geologia no 3.º ciclo do Ensino Básico e no Ensino Secundário',
        'Ensino de Física e de Química no 3.º Ciclo do Ensino Básico e no Ensino Secundário',
        'Ensino de Informática',
        'Ensino de Matemática no 3.º Ciclo do Ensino Básico e no Secundário',
        'Estatística e Investigação Operacional',
        'Física',
        'Geologia',
        'Geologia Aplicada',
        'Geologia do Ambiente, Riscos Geológicos e Ordenamento do Território',
        'Geologia Económica',
        'História e Filosofia das Ciências',
        'Informática',
        'Matemática',
        'Matemática Aplicada à Economia e Gestão',
        'Matemática Financeira',
        'Matemática para Professores',
        'Microbiologia',
        'Microbiologia Aplicada',
        'Navegação e Geomática',
        'Química',
        'Química Tecnológica',
        'Segurança Informática',
        'Sistemas de Informação Geográfica - Tecnologias e Aplicações',
    ]; //56 cursos

    return [
        'coordenador_id' => $faker->unique()->numberBetween(1, 60),
        'nome' => $cursosNomes[$faker->unique()->numberBetween(0, 55)],
        'ano_letivo' => '2018-2019'
    ];
});

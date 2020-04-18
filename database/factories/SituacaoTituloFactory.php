<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Base\SituacaoTitulo;
use Faker\Generator as Faker;

$factory->define(SituacaoTitulo::class, function (Faker $faker) {
    return [
        'id'=>$faker->numberBetween(1,50),
        'descricao'=>$faker->word(25),
        'sigla'=>$faker->word(2)
    ];
});

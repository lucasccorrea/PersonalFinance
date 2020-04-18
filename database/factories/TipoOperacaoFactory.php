<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Base\TipoOperacao;
use Faker\Generator as Faker;

$factory->define(TipoOperacao::class, function (Faker $faker) {
    return [
        'id'=>$faker->numberBetween(1,50),
        'descricao'=>$faker->word(25),
        'tipo'=>$faker->randomElement(['E','S'])
    ];
});

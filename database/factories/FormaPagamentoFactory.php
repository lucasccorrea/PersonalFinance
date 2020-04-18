<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Base\FormaPagamento;
use Faker\Generator as Faker;

$factory->define(FormaPagamento::class, function (Faker $faker) {
    return [
        'id'=>$faker->numberBetween(1,50),
        'descricao'=>$faker->word(25),
        'sigla'=>$faker->word(3)
    ];
});

<?php

use Illuminate\Database\Seeder;

class SituacaoTituloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Base\SituacaoTitulo::class)->create([
            'id'=>1,
            'descricao'=>'Aberto',
            'sigla'=>'AB'
        ]);
        factory(App\Models\Base\SituacaoTitulo::class)->create([
            'id'=>2,
            'descricao'=>'Suspenso',
            'sigla'=>'SP'
        ]);
        factory(App\Models\Base\SituacaoTitulo::class)->create([
            'id'=>3,
            'descricao'=>'Encerrado',
            'sigla'=>'EN'
        ]);
        factory(App\Models\Base\SituacaoTitulo::class)->create([
            'id'=>4,
            'descricao'=>'Cancelado',
            'sigla'=>'CA'
        ]);
        factory(App\Models\Base\SituacaoTitulo::class)->create([
            'id'=>5,
            'descricao'=>'Bonificado',
            'sigla'=>'BO'
        ]);
    }
}

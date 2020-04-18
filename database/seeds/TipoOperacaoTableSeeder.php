<?php

use Illuminate\Database\Seeder;

class TipoOperacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Base\TipoOperacao::class)->create([
            'id'=>1,
            'descricao'=>'Comprar',
            'tipo'=>'E'
        ]);
        factory(App\Models\Base\TipoOperacao::class)->create([
            'id'=>2,
            'descricao'=>'Vender',
            'tipo'=>'S'
        ]);
        factory(App\Models\Base\TipoOperacao::class)->create([
            'id'=>3,
            'descricao'=>'Locar',
            'tipo'=>'S'
        ]);
        factory(App\Models\Base\TipoOperacao::class)->create([
            'id'=>4,
            'descricao'=>'Alugar',
            'tipo'=>'E'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class FormaPagamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Base\FormaPagamento::class)->create([
            'id'=>1,
            'descricao'=>'À Vista',
            'sigla'=>'AVI'
        ]);
        factory(App\Models\Base\FormaPagamento::class)->create([
            'id'=>2,
            'descricao'=>'Boleto',
            'sigla'=>'BOL'
        ]);
        factory(App\Models\Base\FormaPagamento::class)->create([
            'id'=>3,
            'descricao'=>'Cartão de Crédito',
            'sigla'=>'CCR'
        ]);
        factory(App\Models\Base\FormaPagamento::class)->create([
            'id'=>4,
            'descricao'=>'Cartão de Débito',
            'sigla'=>'CDE'
        ]);
        factory(App\Models\Base\FormaPagamento::class)->create([
            'id'=>5,
            'descricao'=>'Débito em Conta',
            'sigla'=>'DCO'
        ]);
        factory(App\Models\Base\FormaPagamento::class)->create([
            'id'=>6,
            'descricao'=>'Cheque',
            'sigla'=>'CHE'
        ]);
        factory(App\Models\Base\FormaPagamento::class)->create([
            'id'=>7,
            'descricao'=>'Transferência TED',
            'sigla'=>'TED'
        ]);
        factory(App\Models\Base\FormaPagamento::class)->create([
            'id'=>8,
            'descricao'=>'Transferência DOC',
            'sigla'=>'DOC'
        ]);
        factory(App\Models\Base\FormaPagamento::class)->create([
            'id'=>9,
            'descricao'=>'Crediario/Carnê',
            'sigla'=>'CRE'
        ]);
    }
}

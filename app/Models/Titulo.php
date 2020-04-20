<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    protected $fillable = [
        'cliente_id',
        'tipo_operacao_id',
        'descricao',
        'lancamento',
        'valor_original',
        'desconto',
        'forma_pagamento_id'
    ];

    public function rules()
    {
        return [
            'cliente_id' => 'required',
            'tipo_operacao_id' => 'required',
            'descricao' => 'required|unique:titulos|max:250',
            'lancamento' => '',
            'valor_original' => 'required',
            'desconto' => '',
            'forma_pagamento_id' => 'required'
        ];
    }

    public function update_rules()
    {
        return [
            'cliente_id' => '',
            'tipo_operacao_id' => '',
            'descricao' => 'unique:titulos|max:250',
            'valor_original' => '',
            'desconto' => '',
            'forma_pagamento_id' => ''
        ];
    }

    public function Clientes()
    {
        return $this->hasOne(Cliente::class, 'id');
    }
}

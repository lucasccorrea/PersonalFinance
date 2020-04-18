<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    protected $fillable = [
        'id',
        'descricao',
        'sigla'
    ];

    public function rules()
    {
        return [
            'id' => 'required',
            'descricao' => 'required|unique:forma_pagamentos|max:25',
            'sigla' => 'required|min:3|max:3'
        ];
    }
}

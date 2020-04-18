<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class SituacaoTitulo extends Model
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
            'descricao' => 'required|unique:situacao_titulos|max:25',
            'sigla' => 'required|min:2|max:2'
        ];
    }
}

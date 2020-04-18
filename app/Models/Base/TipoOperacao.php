<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class TipoOperacao extends Model
{
    protected $fillable = [
        'id',
        'descricao',
        'tipo'
    ];

    public function rules()
    {
        return [
            'id' => 'required',
            'descricao' => 'required|unique:tipo_operacaos|max:25',
            'tipo' => 'required|min:1|max:1'
        ];
    }
}

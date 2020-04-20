<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Telefones;
use App\Models\Titulo;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'imagem',
        'cpf_cnpj'
    ];

    public function rules()
    {
        return [
            'nome' => 'required|min:10|max:140',
            'imagem' => 'image',
            'cpf_cnpj' => 'required|unique:clientes|min:11|max:14'
        ];
    }

    public function update_rules()
    {
        return [
            'nome' => 'min:10|max:140',
            'imagem' => 'image',
            'cpf_cnpj' => 'unique:clientes|min:11|max:14'
        ];
    }

    public function telefones()
    {
        return $this->hasMany(Telefones::class, 'cliente_id', 'id');
    }

    public function tiulos()
    {
        return $this->belongsToOne(Titulo::class, 'cliente_id');
    }
}

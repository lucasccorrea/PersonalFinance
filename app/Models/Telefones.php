<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefones extends Model
{
    protected $fillable = [
        'cliente_id',
        'ddd',
        'telefone'
    ];

    public function rules()
    {
        return [
            'cliente_id' => 'required',
            'ddd' => 'required',
            'telefone' => 'required|min:8|max:9'
        ];
    }

    public function update_rules()
    {
        return [
            'cliente_id' => '',
            'ddd' => '',
            'telefone' => 'unique:telefones|min:8|max:9'
        ];
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }
}

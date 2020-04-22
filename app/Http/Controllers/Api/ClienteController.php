<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends MasterApiController
{
    protected $path = 'clientes';
    protected $nameController = 'Cliente';
    protected $labelImage = 'imagem';
    protected $qtdPaginate = 5;
    
    public function __construct(Cliente $cliente, Request $request)
    {
        $this->model = $cliente;
        $this->Request = $request;
    }

    public function telefone($id)
    {
        if (!$data = $this->model->with('telefones')->find($id)){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        }
        return response()->json($data);
    }
}

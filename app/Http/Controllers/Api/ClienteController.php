<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends MasterApiController
{
    protected $model;
    protected $path = 'clientes';
    protected $nameController = 'Cliente';
    protected $labelImage = 'imagem';
    
    public function __construct(Cliente $cliente, Request $request)
    {
        $this->model = $cliente;
        $this->Request = $request;
    }
}

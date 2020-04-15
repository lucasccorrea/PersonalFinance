<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function __construct(Cliente $cliente, Request $request)
    {
        $this->Cliente = $cliente;
        $this->Request = $request;
    }
    public function index()
    {
        //dd($this->Cliente->all()); //Serve para depurar
        return $this->Cliente->all();
    }
    public function store(){
        $this->validate($this->Request, $this->Cliente->rules());
        $dataForm = $this->Request->all();
        $data = $this->Cliente->create($dataForm);
        return response()->json($data, 201);
    }
}

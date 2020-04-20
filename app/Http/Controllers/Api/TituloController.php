<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use App\Models\Titulo;
use Illuminate\Http\Request;

class TituloController extends MasterApiController
{
    public function __construct(Titulo $mod, Request $request)
    {
        $this->model = $mod;
        $this->Request = $request;
    }

    public function cliente($id)
    {
        if (!$data = $this->model->with('Clientes')->find($id)){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        }
        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use App\Models\Telefones;
use Illuminate\Http\Request;

class TelefoneController extends MasterApiController
{
    public function __construct(Telefones $mod, Request $request)
    {
        $this->model = $mod;
        $this->Request = $request;
    }

    public function cliente($id)
    {
        if (!$data = $this->model->with('cliente')->find($id)){
            return response()->json(['error'=>'Nada foi encontrado'], 404);
        }
        return response()->json($data);
    }
}

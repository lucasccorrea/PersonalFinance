<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Intervention\Image\ImageManagerStatic as Image;

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
        if($this->Request->hasFile('imagem') && $this->Request->file('imagem')->isValid()){
            $extension = $this->Request->imagem->extension();
            $name = uniqid(date('His'));            
            $nameFile = "{$name}.{$extension}";
            $upload = Image::make($dataForm['imagem'])->resize(177,236)->save(storage_path("app/public/clientes/$nameFile", 70));
            if (!$upload){
                return response()->json(['error'=>'Falha ao Fazer Upload'], 500);
            } else {
                $dataForm['imagem'] = $nameFile;
            }
        }
        $data = $this->Cliente->create($dataForm);
        return response()->json($data, 201);
    }
}

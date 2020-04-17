<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    public function __construct(Cliente $cliente, Request $request)
    {
        $this->Cliente = $cliente;
        $this->Request = $request;
    }
    
    public function destroy(int $id)
    {
        $data = $this->Cliente->find($id);
        if (!$data)
            return response()->json(['error'=>'Cliente não encontrado!'], 404);
        if($data->imagem)
            Storage::disk('public')->delete("/clientes/{$data->imagem}");
        $data->delete();
        return response()->json(['success'=>'Cliente deletado com sucesso!'], 200);
    }

    public function index()
    {
        //dd($this->Cliente->all()); //Serve para depurar
        return $this->Cliente->all();
    }

    public function show(int $id)
    {
        $data = $this->Cliente->find($id);
        if (!$data)
            return response()->json(['error'=>'Cliente não encontrado'], 404);
        return response()->json($data);
    }

    public function update(int $id)
    {
        $data = Cliente::find($id);
        if (!$data)
            return response()->json(['error'=>'Cliente não encontrado'], 404);
        $this->validate($this->Request, $this->Cliente->update_rules());
        $dataForm = $this->Request->all();
        if($this->Request->hasFile('imagem') && $this->Request->file('imagem')->isValid())
        {
            $extension = $this->Request->imagem->extension();
            $name = uniqid(date('His'));            
            $nameFile = "{$name}.{$extension}";
            $upload = Image::make($dataForm['imagem'])->resize(177,236)->save(storage_path("app/public/clientes/$nameFile", 70));
            if (!$upload)
                return response()->json(['error'=>'Falha ao Fazer Upload'], 500);
            if ($data->imagem)
                Storage::disk('public')->delete("/clientes/{$data->imagem}");   
            $dataForm['imagem'] = $nameFile;
        }
        $data->update($dataForm);
        return $data;
    }

    public function store()
    {
        $this->validate($this->Request, $this->Cliente->rules());
        $dataForm = $this->Request->all();
        if($this->Request->hasFile('imagem') && $this->Request->file('imagem')->isValid())
        {
            $extension = $this->Request->imagem->extension();
            $name = uniqid(date('His'));            
            $nameFile = "{$name}.{$extension}";
            $upload = Image::make($dataForm['imagem'])->resize(177,236)->save(storage_path("app/public/clientes/$nameFile", 70));
            if (!$upload)
                return response()->json(['error'=>'Falha ao Fazer Upload'], 500);
            $dataForm['imagem'] = $nameFile;
        }
        $data = $this->Cliente->create($dataForm);
        return response()->json($data, 201);
    }
}

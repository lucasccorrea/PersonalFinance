<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class MasterApiController extends BaseController
{    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function destroy(int $id)
    {
        $data = $this->model->find($id);
        if (!$data)
            return response()->json(['error'=>"{$this->nameController} não encontrado!"], 404);
        if($data->imagem)
            Storage::disk('public')->delete("/{$this->path}/{$data->imagem}");
        $data->delete();
        return response()->json(['success'=>"{$this->nameController} deletado com sucesso!"], 200);
    }

    public function index()
    {
        return $this->model->all();
    }

    public function show(int $id)
    {
        $data = $this->model->find($id);
        if (!$data)
            return response()->json(['error'=>"{$this->nameController} não encontrado"], 404);
        return response()->json($data);
    }

    public function update(int $id)
    {
        $data = $this->model->find($id);
        if (!$data)
            return response()->json(['error'=>"{$this->nameController} não encontrado"], 404);
        $this->validate($this->Request, $this->model->update_rules());
        $dataForm = $this->Request->all();
        if($this->Request->hasFile($this->labelImage) && $this->Request->file($this->labelImage)->isValid())
        {
            $dataForm[$this->labelImage] = $this->uploadImagem($dataForm);
            if ($data->imagem)
                Storage::disk('public')->delete("/{$this->path}/{$data->imagem}");
        }
        $data->update($dataForm);
        return $data;
    }

    public function store()
    {
        $this->validate($this->Request, $this->model->rules());
        $dataForm = $this->Request->all();
        if($this->Request->hasFile($this->labelImage) && $this->Request->file($this->labelImage)->isValid())
            $dataForm[$this->labelImage] = $this->uploadImagem($dataForm);
        $data = $this->model->create($dataForm);
        return response()->json($data, 201);
    }

    protected function uploadImagem($dataForm)
    {
        $extension = $this->Request->imagem->extension();
        $name = uniqid(date('His'));            
        $nameFile = "{$name}.{$extension}";
        $upload = Image::make($dataForm[$this->labelImage])->resize(177,236)->save(storage_path("app/public/{$this->path}/$nameFile", 70));
        if (!$upload)
            return response()->json(['error'=>'Falha ao Fazer Upload'], 500);
        return $nameFile;
    }
}

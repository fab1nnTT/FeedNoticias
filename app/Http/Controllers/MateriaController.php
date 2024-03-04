<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Http\Resources\ListarMateriaResource;
use App\Http\Resources\DetalharMateriaResource;
use App\Http\Resources\MateriaResource;
use Illuminate\Http\Request;

class MateriaController extends Controller {

    public function index(){
        $materias = Materia::paginate(15);
        return ListarMateriaResource::collection($materias);
    }

    public function show($id){
        $materia = Materia::findOrFail($id);
        return new DetalharMateriaResource($materia);
    }

    public function store(Request $request){
        $materia = new Materia;
        $materia->titulo = $request->input('titulo');
        $materia->descricao = $request->input('descricao');
        $materia->texto_completo = $request->input('texto_completo');
        $materia->imagem = $request->input('imagem');
        $materia->data_de_publicacao = $request->input('data_de_publicacao');
    
        if($materia->save()){
            return new MateriaResource($materia);
        }
    }
    
    public function update(Request $request){
        $materia = Materia::findOrFail($request->id);
        $materia->titulo = $request->input('titulo');
        $materia->descricao = $request->input('descricao');
        $materia->texto_completo = $request->input('texto_completo');
        $materia->imagem = $request->input('imagem');
        $materia->data_de_publicacao = $request->input('data_de_publicacao');
    
        if($materia->save()){
            return new MateriaResource($materia);
        }
    }
    
    public function destroy($id){
        $materia = Materia::findOrFail($id);
        if($materia->delete()){
            return new MateriaResource($materia);
        }
    }

}
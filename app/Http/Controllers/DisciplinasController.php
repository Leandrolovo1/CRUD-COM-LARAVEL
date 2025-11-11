<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Storage;

class DisciplinasController extends Controller
{
    public function index()
    {
        $disciplina = Disciplina::all();
        return view('disciplina.index', compact('disciplina'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('disciplina.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $curso = Curso::find($request->curso);
        if(isset($curso)) {
            $disciplina = new Disciplina();
            $disciplina->nome = mb_strtoupper($request->nome, 'UTF-8');
            $disciplina->total_aulas = $request->total_aulas;
            $disciplina->curso()->associate($curso);
            $disciplina->save();
        }
        return redirect()->route('disciplina.index');
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $disciplina = Disciplina::find($id);

        if (isset($disciplina)) {
            $curso = Curso::all();
            return view('disciplina.edit', compact(['disciplina', 'curso']));
        }

        return redirect()->route('disciplina.index');

    }
    public function update(Request $request, string $id){
        $disciplina = Disciplina::find($id);
        $curso = Curso::find($request->curso);
        if(!$disciplina){
            return redirect()->route('disciplina.index')->with('erro', 'disciplina não encontrado');
        }
        if(isset($curso) && isset($disciplina)) {
            $disciplina->nome = mb_strtoupper($request->nome, 'UTF-8');
            $disciplina->total_aulas = $request->total_aulas;
            $disciplina->curso()->associate($curso);
            $disciplina->save(); 
        }
        return redirect()->route('disciplina.index');

    }

    public function destroy(string $id){
        $disciplina = Disciplina::find($id);

        if(isset($disciplina)){
            $disciplina->delete();
        }
        return redirect()->route('disciplina.index');
    }
}

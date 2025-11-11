<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;


class CursoController extends Controller
{
    public function index()
    {
        $curso = Curso::all();
        return view('curso.index', compact('curso'));
    }

    public function create()
    {
        $curso = Curso::all();
        return view('curso.create', compact('curso'));
    }

    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->nome = mb_strtoupper($request->nome, 'UTF-8');
        $curso->duracao = $request->duracao;
        $curso->save();
        
        return redirect()->route('curso.index');
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $curso = Curso::find($id);

        if (isset($curso)) {
            return view('curso.edit', compact(['curso', 'curso']));
        }

        return redirect()->route('curso.index');

    }
    public function update(Request $request, string $id){
        $curso = Curso::find($id);
        if(isset($curso)) {
            $curso->nome = mb_strtoupper($request->nome, 'UTF-8');
            $curso->duracao = $request->duracao;    
            $curso->save();
        }
        return redirect()->route('curso.index');
    }

    public function destroy(string $id){
        $curso = Curso::find($id);

        if(isset($curso)){
            $curso->delete();
        }
        return redirect()->route('curso.index');
    }
}

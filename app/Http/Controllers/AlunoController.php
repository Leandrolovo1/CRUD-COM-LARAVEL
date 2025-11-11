<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Storage;

class AlunoController extends Controller
{
    public function index()
    {
        $aluno = Aluno::all();
        return view('aluno.index', compact('aluno'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('aluno.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $curso = Curso::find($request->curso);
        if(isset($curso)) {
            $aluno = new Aluno();
            $aluno->nome = mb_strtoupper($request->nome, 'UTF-8');
            $aluno->ano = $request->ano;
            $aluno->curso()->associate($curso);

            if($request->hasFile('foto')) {

                if ($aluno->foto && "\Storage"::disk('public')->exists($aluno->foto)) {
                    "\Storage"::disk('public')->delete($aluno->foto);
                }

                $extensao_arq = $request->file('foto')->getClientOriginalExtension();

                $name = $aluno->id.'_'.time().'.'.$extensao_arq;

                $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);

                $aluno->foto = 'fotos/'.$name;

            }
            $aluno->save();
        }
        return redirect()->route('aluno.index');
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $aluno = Aluno::find($id);

        if (isset($aluno)) {
            $curso = Curso::all();
            return view('aluno.edit', compact(['aluno', 'curso']));
        }

        return redirect()->route('aluno.index');

    }
    public function update(Request $request, string $id){
        $aluno = Aluno::find($id);
        $curso = Curso::find($request->curso);
        if(!$aluno){
            return redirect()->route('aluno.index')->with('erro', 'Aluno não encontrado');
        }
        if(isset($curso) && isset($aluno)) {
            $aluno->nome = mb_strtoupper($request->nome, 'UTF-8');
            $aluno->ano = $request->ano;
            $aluno->curso()->associate($curso);
            
        }
        if($request->hasFile('foto')) { 
            if ($aluno->foto && "\Storage"::disk('public')->exists($aluno->foto)) {
                "\Storage"::disk('public')->delete($aluno->foto);
            }
            $extensao_arq = $request->file('foto')->getClientOriginalExtension();
            $name = $aluno->id.'_'.time().'.'.$extensao_arq;
            $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
            $aluno->foto = 'fotos/'.$name;
        }
        $aluno->save();
        return redirect()->route('aluno.index');

    }

    public function destroy(string $id){
        $aluno = Aluno::find($id);

        if(isset($aluno)){
            $aluno->delete();
        }
        return redirect()->route('aluno.index');
    }
}

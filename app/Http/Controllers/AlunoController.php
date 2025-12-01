<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $aluno = Aluno::all();
        Gate::authorize('viewAny', Aluno::class);
        return view('aluno.index', compact('aluno'));
    }

    public function create()
    {
        $cursos = Curso::all();
        Gate::authorize('create', Aluno::class);
        return view('aluno.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $curso = Curso::find($request->curso);
        Gate::authorize('create', Aluno::class);
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
        Gate::authorize('view', Aluno::class);
    }
    public function edit(string $id)
    {
        $aluno = Aluno::find($id);
        Gate::authorize('update', $aluno);

        if (isset($aluno)) {
            $curso = Curso::all();
            return view('aluno.edit', compact(['aluno', 'curso']));
        }

        return redirect()->route('aluno.index');

    }
    public function update(Request $request, string $id){
        $aluno = Aluno::find($id);
        Gate::authorize('update', $aluno);
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
        Gate::authorize('delete', $aluno);

        if(isset($aluno)){
            $aluno->delete();
        }
        return redirect()->route('aluno.index');
    }
}

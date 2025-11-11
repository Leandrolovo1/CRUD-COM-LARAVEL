@extends('templates/main', [
    'titulo' => 'Sistema Aula',
    'cabecalho' => 'Alterar Aluno',
    'rota' => '',
    'relatorio' => '',
])
@section('conteudo')
    <form action="{{ route('aluno.update', $aluno->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="">Nome:</label>
            <input class="form-control" type="text" name="nome" value="{{$aluno->nome}}"/>
            <label for="">Ano:</label>
            <input class="form-control" type="text"  name="ano" value="{{$aluno->ano}}"/>
            <label for="">Cursos:</label>
            <select class="form-control" name="curso">
                <option value="">-- Selecione o curso --</option>
                @foreach ($curso as $c)
                    <option value="{{ $c->id }}" {{ $aluno->curso_id == $c->id ? 'selected' : '' }}>
                        {{ $c->nome }}
                    </option>
                @endforeach
            </select>
            <label for="">Foto:</label>
            <input class="form-control text-secondary" type="file" name="foto" value="{{$aluno->foto}}"/>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </div>
    </form>
@endsection 
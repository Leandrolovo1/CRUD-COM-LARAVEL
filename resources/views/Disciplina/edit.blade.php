@extends('templates/main', [
    'titulo' => 'Sistema Disciplina',
    'cabecalho' => 'Alterar Disciplina',
    'rota' => '',
    'relatorio' => '',
])
@section('conteudo')
    <form action="{{ route('disciplina.update', $disciplina->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="">Nome:</label>
            <input class="form-control" type="text" name="nome" value="{{$disciplina->nome}}"/>
            <label for="">total Aulas:</label>
            <input class="form-control" type="text"  name="total_aulas" value="{{$disciplina->total_aulas}}"/>
            <label for="">Cursos:</label>
            <select class="form-control" name="curso">
                <option value="">-- Selecione o curso --</option>
                @foreach ($curso as $c)
                    <option value="{{ $c->id }}" {{ $disciplina->curso_id == $c->id ? 'selected' : '' }}>
                        {{ $c->nome }}
                    </option>
                @endforeach
                </select>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </div>
    </form>
@endsection 
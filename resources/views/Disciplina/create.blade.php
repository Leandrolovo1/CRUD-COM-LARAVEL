@extends('templates/main', [
    'titulo' => 'Sistema Disciplina',
    'cabecalho' => 'Novo Disciplina',
    'rota' => '',
    'relatorio' => '',
])
@section('conteudo')
    <form action="{{ route('disciplina.store') }}" method="POST" enctype="multipart/form-data">
        @csrf   
        <div>
            <label for="">Nome:</label>
            <input class="form-control" type="text" name="nome" value=""/>
            <label for="">Total Aulas:</label>
            <input class="form-control" type="text"  name="total_aulas" value=""/>
            <label for="">Cursos:</label>
            <select class="form-control" name="curso">
                <option value="">-- Selecione o curso --</option>
                @foreach ($cursos as $c)
                    <option value="{{ $c->id }}" {{$c->curso_id == $c->id ? 'selected' : '' }}>
                        {{ $c->nome }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </div>
    </form>
@endsection

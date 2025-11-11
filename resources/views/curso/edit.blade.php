@extends('templates/main', [
    'titulo' => 'Sistema Aula',
    'cabecalho' => 'Alterar Aluno',
    'rota' => '',
    'relatorio' => '',
])
@section('conteudo')
    <form action="{{ route('curso.update', $curso->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="">Nome:</label>
            <input class="form-control" type="text" name="nome" value="{{$curso->nome}}"/>
            <label for="">Duração:</label>
            <input class="form-control" type="text"  name="duracao" value="{{$curso->duracao}}"/>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </div>
    </form>
@endsection 
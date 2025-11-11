@extends('templates/main', [
    'titulo' => 'Sistema Curso',
    'cabecalho' => 'Novo Curso',
    'rota' => '',
    'relatorio' => '',
])
@section('conteudo')
    <form action="{{ route('curso.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Nome:</label>
            <input class="form-control" type="text" name="nome" value=""/>
            <label for="">Duração:</label>
            <input class="form-control" type="text"  name="duracao" value=""/>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </div>
    </form>
@endsection

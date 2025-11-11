@extends('templates/main', [
    'titulo' => 'Sistema Aula',
    'cabecalho' => 'Novo Aluno',
    'rota' => '',
    'relatorio' => '',
])
@section('conteudo')
    <form action="{{ route('aluno.store') }}" method="POST" enctype="multipart/form-data">
        @csrf   
        <div>
            <label for="">Nome:</label>
            <input class="form-control" type="text" name="nome" value=""/>
            <label for="">Ano:</label>
            <input class="form-control" type="text"  name="ano" value=""/>
            <label for="">Cursos:</label>
            <select class="form-control" name="curso">
                <option value="">-- Selecione o curso --</option>
                @foreach ($cursos as $c)
                    <option value="{{ $c->id }}" {{$c->curso_id == $c->id ? 'selected' : '' }}>
                        {{ $c->nome }}
                    </option>
                @endforeach
            </select>
            <label for="">Foto:</label>
            <input class="form-control text-secondary" type="file" name="foto" value=""/>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </div>
    </form>
@endsection

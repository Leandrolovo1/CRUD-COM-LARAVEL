@extends('templates/main', [
    'titulo' => 'Sistema Aula' ,
    'cabecalho' => 'Lista de Cursos',
    'rota' => '',
    'relatorio' => '',
])
@section('conteudo')
    <a href="{{ route('curso.create') }}" class="btn btn-info">Criar um Novo Curso</a>
    <table class="table .table-striped">
        <thead>
            <tr>
                <th class="text-secondary">NOME</th>
                <th class="d-none d-md-table-cell text-secondary">Duração</th>
                <th class="text-secondary">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($curso as $a)
                <tr>
                    <td>{{ $a->nome }}</td>
                    <td>{{ $a->duracao }}</td>
                    <td>
                        <form action="{{route('curso.destroy', $a->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('tem certeza que deseja excluir esse {{$a->nome}}?')">Excluir</button>
                        </form>
                        <form action="{{route('curso.edit', $a->id ) }}" method="GET">
                            <button type="submit" class="btn btn-primary btn-sm"> Editar </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

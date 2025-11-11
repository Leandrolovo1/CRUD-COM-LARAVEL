@extends('templates/main', [
    'titulo' => 'Sistema Disciplina', 
    'cabecalho' => 'Lista de Disciplinas',
    'rota' => '',
    'relatorio' => '',
])
@section('conteudo')
    <a href="{{ route('disciplina.create') }}" class="btn btn-info">Criar um Novo disciplinas</a>
    <table class="table .table-striped">
        <thead>
            <tr>
                <th class="text-secondary">NOME</th>
                <th class="d-none d-md-table-cell text-secondary">Total de Aulas</th>
                <th class="text-secondary">PERTENCE AO CURSO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disciplina as $a)
                <tr>
                    <td>{{ $a->nome }}</td>
                    <td>{{ $a->total_aulas }}</td>
                    <td>{{ $a->curso->nome ?? 'sem curso' }}</td>
                    <td>
                        <form action="{{route('disciplina.destroy', $a->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('tem certeza que deseja excluir esse {{$a->nome}}?')">Excluir</button>
                        </form>
                        <form action="{{route('disciplina.edit', $a->id ) }}" method="GET">
                            <button type="submit" class="btn btn-primary btn-sm"> Editar </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

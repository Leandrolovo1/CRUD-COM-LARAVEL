@extends('templates/main', [
    'titulo' => 'Sistema Aula' ,
    'cabecalho' => 'Lista de Alunos',
    'rota' => '',
    'relatorio' => '',
])
@section('conteudo')
    <a href="{{ route('aluno.create') }}" class="btn btn-info">Criar um Novo Aluno</a>
    <table class="table .table-striped">
        <thead>
            <tr>
                
                <th class="text-secondary">FOTO</th>
                <th class="text-secondary">NOME</th>
                <th class="d-none d-md-table-cell text-secondary">TURMA</th>
                <th class="d-none d-md-table-cell text-secondary">ANO</th>
                <th class="text-secondary">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aluno as $a)
                <tr>
                    <td >
                        @if ($a->foto)
                        <img src="{{ asset('storage/' . $a->foto) }}" width="120">
                        @endif
                    </td>
                    <td>{{ $a->nome }}</td>
                    <td>{{ $a->ano }}</td>
                    <td>{{ $a->curso->nome ?? 'sem curso' }}</td>
                    <td>
                        <form action="{{route('aluno.destroy', $a->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('tem certeza que deseja excluir esse {{$a->nome}}?')">Excluir</button>
                        </form>
                        <form action="{{route('aluno.edit', $a->id ) }}" method="GET">
                            <button type="submit" class="btn btn-primary btn-sm"> Editar </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('templates/main', [
    'titulo' => 'Sistema OS',
    'cabecalho' => 'Ordens de Serviço',
    'rota' => '',
    'relatorio' => '',
])

@section('conteudo')

    <a href="{{ route('ordemServicos.create') }}" class="btn btn-info mb-3">
        Criar Nova Ordem de Serviço
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-secondary">CLIENTE</th>
                <th class="text-secondary d-none d-md-table-cell">STATUS</th>
                <th class="text-secondary d-none d-md-table-cell">TIPO DE MÁQUINA</th>
                <th class="text-secondary d-none d-md-table-cell">DEFEITO</th>
                <th class="text-secondary d-none d-md-table-cell">LAUDO TÉCNICO</th>
                <th class="text-secondary d-none d-md-table-cell">FOTO</th>
                <th class="text-secondary">AÇÕES</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($ordens as $os)
                <tr>
                    <!-- Cliente -->
                    <td>{{ $os->user->name ?? 'Não informado' }}</td>

                    <!-- Status -->
                    <td class="d-none d-md-table-cell">
                        {{ $os->status->nome_status ?? 'Sem status' }}
                    </td>

                    <!-- Tipo de Máquina -->
                    <td class="d-none d-md-table-cell">
                        {{ $os->tipoMaquina->tipo_maquina ?? 'Sem tipo' }}
                    </td>

                    <!-- Defeito -->
                    <td class="d-none d-md-table-cell">{{ $os->defeito_pedido }}</td>

                    <!-- Laudo -->
                    <td class="d-none d-md-table-cell">{{ Str::limit($os->laudo, 30) }}</td>

                    <!-- Foto -->
                    <td class="d-none d-md-table-cell">
                        @if ($os->foto)
                            <img src="{{ Storage::url($os->foto) }}" width="80" height="80" class="rounded">
                        @else
                            <span class="text-muted">Sem foto</span>
                        @endif
                    </td>

                    <!-- Ações -->
                    <td>
                        <!-- Botão Editar -->
                        <form action="{{ route('ordemServicos.edit', $os->id) }}" method="GET" class="d-inline">
                            <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                        </form>

                        <!-- Botão Excluir -->
                        <form action="{{ route('ordemServicos.destroy', $os->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza que deseja excluir essa OS?')">
                                Excluir
                            </button>
                        </form>

                        <!-- Botão Visualizar (Opcional) -->
                        <form action="{{ route('ordemServicos.show', $os->id) }}" 
                              method="GET" class="d-inline">
                            <button class="btn btn-secondary btn-sm">Ver</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection

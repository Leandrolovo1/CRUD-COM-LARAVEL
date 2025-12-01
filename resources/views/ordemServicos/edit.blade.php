@extends('templates/main', [
    'titulo' => 'Editar Ordem de Serviço',
    'cabecalho' => 'Editar OS #' . $ordem->id,
    'rota' => '',
    'relatorio' => '',
])

@section('conteudo')

    <form action="{{ route('ordemServicos.update', $ordem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            <!-- Cliente -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Cliente:</label>
                <select class="form-control" name="user_id" required>
                    <option value="">-- Selecione o cliente --</option>
                    @foreach ($clientes as $u)
                        <option value="{{ $u->id }}" 
                            {{ $ordem->user_id == $u->id ? 'selected' : '' }}>
                            {{ $u->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Status -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Status:</label>
                <select class="form-control" name="status_id" required>
                    <option value="">-- Selecione o status --</option>
                    @foreach ($status as $s)
                        <option value="{{ $s->id }}" 
                            {{ $ordem->status_id == $s->id ? 'selected' : '' }}>
                            {{ $s->nome_status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tipo da máquina -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Tipo da Máquina:</label>
                <select class="form-control" name="tipo_maquinas_id" required>
                    <option value="">-- Selecione o tipo da máquina --</option>
                    @foreach ($tipos as $t)
                        <option value="{{ $t->id }}" 
                            {{ $ordem->tipo_maquinas_id == $t->id ? 'selected' : '' }}>
                            {{ $t->tipo_maquina }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Defeito -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Defeito informado:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="defeito_pedido" 
                    value="{{ $ordem->defeito_pedido }}">
            </div>

            <!-- Laudo -->
            <div class="col-12 mb-3">
                <label class="form-label">Laudo Técnico:</label>
                <textarea class="form-control" name="laudo" rows="4" required>{{ $ordem->laudo }}</textarea>
            </div>

            <!-- Foto atual -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Foto Atual:</label><br>

                @if ($ordem->foto)
                    <img src="{{ asset('storage/' . $ordem->foto) }}" 
                         width="120" height="120" class="rounded mb-2">
                @else
                    <p class="text-muted">Nenhuma foto enviada</p>
                @endif
            </div>

            <!-- Enviar nova foto -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Alterar Foto:</label>
                <input type="file" class="form-control" name="foto">
            </div>

        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="{{ route('ordemServicos.index') }}" class="btn btn-secondary">Voltar</a>

    </form>

@endsection

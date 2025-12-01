@extends('templates/main', [
    'titulo' => 'Sistema Aula',
    'cabecalho' => 'Novo Aluno',
    'rota' => '',
    'relatorio' => '',
])
@section('conteudo')
    <form action="{{ route('ordemServicos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf   
        <div>
            <select class="form-control" name="status">
                <option value="">-- Selecione o cliente --</option>
                @foreach ($user as $u)
                    <option value="{{ $u->id }}">
                        {{ $u->nome }}
                    </option>
                @endforeach
            </select>
            <label for="">defeito:</label>
            <input class="form-control" type="text" name="defeito_pedido" value=""/>
            <select class="form-control" name="status">
                <option value="">-- Selecione o status --</option>
                @foreach ($status as $s)
                    <option value="{{ $s->id }}">
                        {{ $s->nome_status }}
                    </option>
                @endforeach
            </select>

            <select class="form-control" name="tipo">
                <option value="">-- Selecione o tipo da maquina--</option>
                @foreach ($tipo_maquinas as $s)
                    <option value="{{ $s->id }}">
                        {{ $s->tipo_maquina }}
                    </option>
                @endforeach
            </select>
            <label for="">Laudo:</label>
            <input class="form-control" type="bigtext" name="laudo_tecnico" value=""/>
            <label for="">Foto:</label>
            <input class="form-control text-secondary" type="file" name="foto" value=""/>
            <button type="submit" class="btn btn-success btn-sm mt-2">Salvar</button>
        </div>
    </form>
@endsection

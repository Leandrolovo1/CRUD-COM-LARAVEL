<?php

namespace App\Http\Controllers;

use App\Models\OrdemDeServico;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Status;
use App\Models\tipoMaquinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrdemDeServicoController extends Controller
{
    // LISTAR
    public function index()
    {
        Gate::authorize('viewAny', OrdemDeServico::class);

        $ordens = OrdemDeServico::with(['user', 'status', 'tipoMaquina'])
        ->orderBy('id', 'DESC')
        ->get();
        
        return view('ordemServicos.index', compact('ordens'));
    }

    // FORMULÁRIO DE CADASTRO
    public function create()
    {
        Gate::authorize('create', OrdemDeServico::class);

        // lista de clientes (todos usuários que NÃO são técnicos)
        $clientes = User::where('role_id', '!=', 2)->get();

        $status = Status::all();
        $tipos = tipoMaquinas::all();

        return view('ordemServicos.create', compact('clientes', 'status', 'tipos'));
    }

    // SALVAR
    public function store(Request $request)
    {
        Gate::authorize('create', OrdemDeServico::class);

    $ordem = new OrdemDeServico();
    $ordem->defeito_pedido = $request->defeito_pedido;
    $ordem->laudo = $request->laudo_tecnico;
    $ordem->status_id = $request->status;
    $ordem->tipo_maquinas_id = $request->tipo;
    $ordem->user_id = $request->user; // cliente

     

    
        if ($request->hasFile('foto')) {

            // Caminho da pasta pública onde vamos salvar
            $pastaPublica = public_path('storage/fotos');

            // Cria a pasta se não existir
            if (!file_exists($pastaPublica)) {
                mkdir($pastaPublica, 0755, true);
            }

            // Deleta a foto antiga, se existir
            if ($ordem->foto && file_exists(public_path($ordem->foto))) {
                unlink(public_path($ordem->foto));
            }

            // Pega a extensão original
            $extensao_arq = $request->file('foto')->getClientOriginalExtension();

            // Define o nome do arquivo
            $nomeArquivo = $ordem->id . '_' . time() . '.' . $extensao_arq;

            // Move o arquivo para a pasta pública
            $request->file('foto')->move($pastaPublica, $nomeArquivo);

            // Salva o caminho relativo no banco (para usar no Blade)
            $ordem->foto = 'storage/fotos/' . $nomeArquivo;
        }

        $ordem->save();


    return redirect()->route('ordemServicos.index')
                     ->with('success', 'Ordem de serviço cadastrada com sucesso!');
}

    // FORMULÁRIO DE EDIÇÃO
    public function edit($id)
    {
        $ordem = OrdemDeServico::findOrFail($id);

        Gate::authorize('update', $ordem);

        $clientes = User::all();
        $status = Status::all();
        $tipos = tipoMaquinas::all();

        return view('ordemServicos.edit', compact('ordem', 'clientes', 'status', 'tipos'));
    }

    // ATUALIZAR
   public function update(Request $request, $id)
{
    $ordem = OrdemDeServico::findOrFail($id);

    Gate::authorize('update', $ordem);
    $ordem->user_id = $request->user_id;
    $ordem->defeito_pedido = $request->defeito_pedido;
    $ordem->laudo = $request->laudo;
    $ordem->status_id = $request->status_id;
    $ordem->tipo_maquinas_id = $request->tipo_maquinas_id;

            if ($request->hasFile('foto')) {

            // Caminho da pasta pública onde vamos salvar
            $pastaPublica = public_path('storage/fotos');

            

            // Deleta a foto antiga, se existir
            if ($ordem->foto && file_exists(public_path($ordem->foto))) {
                unlink(public_path($ordem->foto));
            }

            // Pega a extensão original
            $extensao_arq = $request->file('foto')->getClientOriginalExtension();

            // Define o nome do arquivo
            $nomeArquivo = $ordem->id . '_' . time() . '.' . $extensao_arq;

            // Salva o caminho relativo no banco (para usar no Blade)
            $ordem->foto = 'fotos/' . $nomeArquivo;
        }

        $ordem->save();


    return redirect()->route('ordemServicos.index')
                     ->with('success', 'Ordem de serviço atualizada com sucesso!');
}

    // DELETAR
    public function destroy($id)
    {
        $ordem = OrdemDeServico::findOrFail($id);

        Gate::authorize('delete', $ordem);

        $ordem->delete();

        return redirect()->route('ordemServicos.index')
            ->with('success', 'Ordem de serviço removida!');
    }
}

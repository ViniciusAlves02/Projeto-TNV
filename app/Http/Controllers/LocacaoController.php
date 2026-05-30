<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locacao;

class LocacaoController extends Controller
{
    // Listar locações trazendo os dados do cliente, funcionário e filme (igualmente você fez)
    public function index()
    {
        $locacoes = Locacao::with(['user', 'funcionario', 'filme'])->get();
        return view('locacoes', compact('locacoes'));
    }

    // Criar uma nova locação
    public function store(Request $request)
    {
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'funcionario_id' => 'required|exists:funcionarios,id',
        'filme_id' => 'required|exists:filmes,id',
        'data_locacao' => 'required|date',
        'data_precista_devolucao' => 'required|date',
        'valor_locacao' => 'required|numeric',
        'status' => 'required|string',
    ]);

    Locacao::create($validated);

    // Redireciona de volta para a listagem com uma mensagem na sessão
    return redirect()->route('locacoes.index')->with('success', 'Locação cadastrada com sucesso!');
    }

    // Atualizar o status (ex: quando o cliente devolve o filme)
    public function darBaixa(Request $request, $id)
    {
    $locacao = Locacao::findOrFail($id);

    $locacao->update([
        'data_devolucao' => now(),
        'status' => 'Devolvido'
    ]);

    // Redireciona para o painel atualizado com aviso de sucesso
    return redirect()->route('locacoes.index')->with('success', 'Devolução realizada com sucesso!');
    }
}
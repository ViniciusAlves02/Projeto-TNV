<?php

namespace App\Http\Controllers;

use App\Models\Locacao;
use App\Models\Filme;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
    public function index()
    {
        $locacoes = Locacao::with(['filme', 'user', 'funcionario'])->get();
        return view('locacoes', compact('locacoes'));
    }

    public function mostrarTelaAlugar($id)
    {
        $filme = Filme::findOrFail($id);
        return view('alugar', compact('filme'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'filme_id'       => 'required|exists:filmes,id',
            'data_locacao'   => 'required|date',
            'data_devolucao' => 'required|date|after_or_equal:data_locacao',
        ]);

        $filme = Filme::findOrFail($request->filme_id);

        Locacao::create([
            'filme_id'       => $request->filme_id,
            'user_id'        => auth()->id() ?? 1, 
            'funcionario_id'  => auth()->id() ?? 1,
            'data_locacao'   => $request->data_locacao,
            'data_devolucao' => $request->data_devolucao,
            'valor_locacao'  => $filme->preco_locacao, 
            'status'         => 'Pendente',
        ]);

        return redirect()->route('home')->with('success', 'Filme alugado com sucesso! Verifique no painel.');
    }
}
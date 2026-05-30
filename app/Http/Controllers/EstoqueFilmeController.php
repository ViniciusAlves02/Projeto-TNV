<?php

namespace App\Http\Controllers;

use App\Models\EstoqueFilme;
use Illuminate\Http\Request;

class EstoqueFilmeController extends Controller
{
    // Listar o estoque de todos os filmes
    public function index()
    {
        return response()->json(EstoqueFilme::with('filme')->get(), 200);
    }

    // Atualizar a quantidade de um filme no estoque
    public function update(Request $request, $filme_id)
    {
        $validated = $request->validate([
            'quantidade_total' => 'required|integer|min:0'
        ]);

        $estoque = EstoqueFilme::where('filme_id', $filme_id)->firstOrFail();
        $estoque->update($validated);

        return response()->json(['message' => 'Estoque atualizado!', 'estoque' => $estoque], 200);
    }
}
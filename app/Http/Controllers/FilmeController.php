<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    // Listar todos os filmes
    public function index()
    {
        return response()->json(Filme::all(), 200);
    }

    // Criar um novo filme
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'diretor' => 'required|string|max:255',
            'ano_lacamento' => 'required|integer',
            'classificacao_indicativa' => 'required|string|max:10',
            'descricao' => 'nullable|string',
            'preco_locacao' => 'required|numeric',
        ]);

        $filme = Filme::create($validated);
        return response()->json($filme, 201);
    }

    // Mostrar um filme específico
    public function show($id)
    {
        return response()->json(Filme::findOrFail($id), 200);
    }
}
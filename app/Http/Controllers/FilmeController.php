<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index()
    {
        return response()->json(Filme::all(), 200);
    }

    public function create()
    {
        // Busca todos os filmes salvos para listar o catálogo na mesma página
        $filmes = Filme::all();
        
        return view('cadastro_filme', compact('filmes'));
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'titulo'                   => 'required|string|max:255',
        'genero'                   => 'required|string|max:255',
        'diretor'                  => 'required|string|max:255',
        'ano_lancamento'           => 'required|integer',
        'classificacao_indicativa' => 'required|string|max:10',
        'descricao'                => 'nullable|string',
        'preco_locacao'            => 'required|numeric',
    ]);

    Filme::create($validated);

    return redirect()->back()->with('success', 'Filme adicionado ao catálogo com sucesso!');

        // Cria o filme no banco de dados
        Filme::create([
            'titulo' => $validated['titulo'],
            'genero' => $validated['genero'],
            'ano_lacamento' => $validated['ano_lacamento'],
            'diretor' => 'Não informado',
            'classificacao_indicativa' => 'Livre',
            'preco_locacao' => 0.00
        ]);

        // Redireciona de volta para a página com mensagem de sucesso
        return redirect()->back()->with('success', 'Filme adicionado ao catálogo com sucesso!');
    }

    public function show($id)
    {
        return response()->json(Filme::findOrFail($id), 200);
    }
}
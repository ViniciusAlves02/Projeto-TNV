<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        return response()->json(Funcionario::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric',
        ]);

        $funcionario = Funcionario::create($validated);
        return response()->json($funcionario, 201);
    }
}
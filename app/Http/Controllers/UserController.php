<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller
{
    // Listar clientes para preencher o campo de seleção no Front-end
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    // Cadastrar um novo cliente
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Criptografa a senha antes de salvar
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);
        return response()->json($user, 201);
    }

    // Exibe a página visual de login
    public function login()
    {
        return view('login');
    }

    // Processa a tentativa de login do utilizador
    public function autenticar(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redireciona para o teu painel de locações que vimos na imagem anterior
            return redirect()->intended('painel-locacoes');
        }

        // Se falhar, volta para o formulário com uma mensagem de erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registos.',
        ]);
    }

    // Faz o logout (sair do sistema)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
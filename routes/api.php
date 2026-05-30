<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Importando todas as suas Controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EstoqueFilmeController;

// --- ROTAS DE USUÁRIOS (CLIENTES) ---
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

// --- ROTAS DE FUNCIONÁRIOS ---
Route::get('/funcionarios', [FuncionarioController::class, 'index']);
Route::post('/funcionarios', [FuncionarioController::class, 'store']);

// --- ROTAS DE FILMES ---
Route::get('/filmes', [FilmeController::class, 'index']);
Route::get('/filmes/{id}', [FilmeController::class, 'show']);
Route::post('/filmes', [FilmeController::class, 'store']);

// --- ROTAS DE ESTOQUE ---
Route::get('/estoque', [EstoqueFilmeController::class, 'index']);
Route::put('/estoque/{filme_id}', [EstoqueFilmeController::class, 'update']);

// --- ROTAS DE LOCAÇÃO ---
Route::get('/locacoes', [LocacaoController::class, 'index']);
Route::post('/locacoes', [LocacaoController::class, 'store']);
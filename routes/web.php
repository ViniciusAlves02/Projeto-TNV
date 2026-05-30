<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocacaoController;

// Rota da Landing Page
Route::get('/', function () {
    return view('home');
})->name('home');

// Rota do Painel de Locações (Chama a controller para trazer os dados do banco)
Route::get('/painel-locacoes', [LocacaoController::class, 'index'])->name('locacoes.index');
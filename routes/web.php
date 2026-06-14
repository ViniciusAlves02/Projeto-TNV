<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\LocacaoController; 

Route::get('/', function () {
    $filmes = \App\Models\Filme::all();
    return view('home', compact('filmes'));
})->name('home');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'autenticar'])->name('login.autenticar');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/filmes/novo', [FilmeController::class, 'create'])->name('filmes.create');
Route::post('/filmes/novo', [FilmeController::class, 'store'])->name('filmes.store');

Route::get('/painel-locacoes', [LocacaoController::class, 'index'])->name('locacoes.index');
Route::get('/filmes/alugar/{id}', [LocacaoController::class, 'mostrarTelaAlugar'])->name('locacoes.alugar');
Route::post('/filmes/alugar', [LocacaoController::class, 'store'])->name('locacoes.store');
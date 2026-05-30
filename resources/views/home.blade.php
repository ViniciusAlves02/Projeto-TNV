@extends('layouts.app')

@section('content')
<div class="p-5 mb-4 bg-white rounded-3 shadow-sm border">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold text-dark">Bem-vindo à Locadora TNV</h1>
        <p class="col-md-8 mx-auto fs-4 text-muted">O lugar perfeito para encontrar os melhores filmes, gerenciar locações e controlar o catálogo em tempo real.</p>
        <a href="{{ route('locacoes.index') }}" class="btn btn-warning btn-lg fw-bold px-4">Ir para o Painel de Locações</a>
    </div>
</div>
@endsection
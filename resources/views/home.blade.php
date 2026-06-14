@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="p-5 mb-5 bg-white rounded-3 shadow-sm text-center">
        <h1 class="display-5 fw-bold text-dark">🎬 Bem-vindo à Locadora TNV</h1>
        <p class="col-md-8 mx-auto fs-5 text-muted mb-0">
            O lugar perfeito para encontrar os melhores filmes, gerenciar locações e controlar o catálogo em tempo real.
        </p>
    </div>

    <div class="mb-4">
        <h3 class="fw-bold text-dark"><span class="text-warning">⚡</span> Filmes Disponíveis no Catálogo</h3>
        <p class="text-muted">Confira os títulos disponíveis para locação no sistema.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @forelse($filmes as $filme)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 bg-white">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-light text-dark border fw-normal">{{ $filme->genero }}</span>
                            <span class="badge bg-dark small">{{ $filme->classificacao_indicativa }}</span>
                        </div>

                        <h4 class="card-title fw-bold text-dark my-2">{{ $filme->titulo }}</h4>
                        
                        <p class="card-text text-muted small mb-3">
                            <strong>Diretor:</strong> {{ $filme->diretor }}<br>
                            <strong>Ano:</strong> {{ $filme->ano_lancamento }}
                        </p>

                        <p class="card-text text-secondary text-sm flex-grow-1" style="font-size: 0.9rem;">
                            {{ $filme->descricao ?? 'Nenhuma sinopse disponível para este filme.' }}
                        </p>

                        <div class="border-top pt-3 mt-3 d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Valor Aluguel</small>
                                <span class="text-success fw-bold fs-5">R$ {{ number_format($filme->preco_locacao, 2, ',', '.') }}</span>
                            </div>
                            <a href="{{ route('locacoes.alugar', $filme->id) }}" class="btn btn-primary">Alugar Filme</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 w-100 text-center py-5 bg-white rounded shadow-sm">
                <p class="text-muted m-0 fs-5">Nenhum filme disponível no catálogo no momento.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
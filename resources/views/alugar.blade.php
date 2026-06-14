@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 bg-white">
                <div class="card-header bg-dark text-white p-3">
                    <h5 class="mb-0 fw-bold">🎬 Confirmar Locação</h5>
                </div>
                <div class="card-body p-4">
                    
                    <form action="{{ route('locacoes.store') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="filme_id" value="{{ $filme->id }}">

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Filme Selecionado</label>
                            <input type="text" class="form-control bg-light fw-bold" value="{{ $filme->titulo }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Preço da Locação</label>
                            <input type="text" class="form-control bg-light text-success fw-bold" value="R$ {{ number_format($filme->preco_locacao, 2, ',', '.') }}" disabled>
                        </div>

                        <hr class="my-4">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Data de Locação</label>
                            <input type="date" name="data_locacao" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Data de Devolução</label>
                            <input type="date" name="data_devolucao" class="form-control" required>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('home') }}" class="btn btn-light border w-50">Voltar</a>
                            <button type="submit" class="btn btn-success w-50 fw-bold">Confirmar Aluguel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
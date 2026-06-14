@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark m-0">🎬 Catálogo & Cadastro de Filmes</h2>
                <a href="{{ route('locacoes.index') }}" class="btn btn-outline-dark btn-sm fw-bold">
                    ← Voltar para Locações
                </a>
            </div>

            <div class="card shadow-sm border-0 mb-5">
                <div class="card-header bg-dark text-white fw-bold py-3">Adicionar Novo Filme ao Catálogo</div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm mb-4">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('filmes.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold small text-uppercase text-muted">Título do Filme</label>
                                <input type="text" name="titulo" class="form-control" placeholder="Ex: Interstellar" value="{{ old('titulo') }}" required>
                            </div>
                            
                            <div class="col-md-4">
                                <label class="form-label fw-bold small text-uppercase text-muted">Gênero</label>
                                <input type="text" name="genero" class="form-control" placeholder="Ex: Ficção, Drama" value="{{ old('genero') }}" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold small text-uppercase text-muted">Diretor</label>
                                <input type="text" name="diretor" class="form-control" placeholder="Ex: Christopher Nolan" value="{{ old('diretor') }}" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold small text-uppercase text-muted">Ano de Lançamento</label>
                                <input type="number" name="ano_lancamento" class="form-control" placeholder="Ex: 2014" value="{{ old('ano_lancamento') }}" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold small text-uppercase text-muted">Classificação Indicativa</label>
                                <select name="classificacao_indicativa" class="form-select" required>
                                    <option value="Livre" {{ old('classificacao_indicativa') == 'Livre' ? 'selected' : '' }}>Livre</option>
                                    <option value="10 anos" {{ old('classificacao_indicativa') == '10 anos' ? 'selected' : '' }}>10 anos</option>
                                    <option value="12 anos" {{ old('classificacao_indicativa') == '12 anos' ? 'selected' : '' }}>12 anos</option>
                                    <option value="14 anos" {{ old('classificacao_indicativa') == '14 anos' ? 'selected' : '' }}>14 anos</option>
                                    <option value="16 anos" {{ old('classificacao_indicativa') == '16 anos' ? 'selected' : '' }}>16 anos</option>
                                    <option value="18 anos" {{ old('classificacao_indicativa') == '18 anos' ? 'selected' : '' }}>18 anos</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold small text-uppercase text-muted">Preço de Locação (R$)</label>
                                <input type="number" step="0.01" name="preco_locacao" class="form-control" placeholder="Ex: 9.90" value="{{ old('preco_locacao') }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small text-uppercase text-muted">Descrição / Sinopse</label>
                                <textarea name="descricao" class="form-control" rows="3" placeholder="Digite uma breve sinopse do filme...">{{ old('descricao') }}</textarea>
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-warning fw-bold text-dark px-4 shadow-sm">🍿 Salvar no Catálogo</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-secondary text-white fw-bold py-3">Filmes no Sistema</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="ps-4">ID</th>
                                    <th>Título</th>
                                    <th>Gênero</th>
                                    <th>Diretor</th>
                                    <th>Ano</th>
                                    <th>Classificação</th>
                                    <th>Preço</th>
                                    <th class="pe-4">Descrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($filmes as $filme)
                                    <tr>
                                        <td class="ps-4 fw-bold text-muted">{{ $filme->id }}</td>
                                        <td class="fw-bold text-dark">{{ $filme->titulo }}</td>
                                        <td><span class="badge bg-light text-dark border">{{ $filme->genero }}</span></td>
                                        <td>{{ $filme->diretor }}</td>
                                        <td>{{ $filme->ano_lancamento }}</td>
                                        <td><span class="badge bg-dark">{{ $filme->classificacao_indicativa }}</span></td>
                                        <td class="fw-bold text-success">R$ {{ number_format($filme->preco_locacao, 2, ',', '.') }}</td>
                                        <td class="pe-4 text-muted small" style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $filme->descricao }}">
                                            {{ $filme->descricao ?? 'Nenhuma descrição.' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4 text-muted">Nenhum filme cadastrado no catálogo ainda.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
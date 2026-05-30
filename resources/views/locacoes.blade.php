@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark">Painel Administrativo - Locações</h2>
    <span class="badge bg-dark fs-6">{{ count($locacoes) }} Registro(s)</span>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Cliente (User)</th>
                        <th>Filme</th>
                        <th>Atendido por</th>
                        <th>Data Locação</th>
                        <th>Valor</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($locacoes as $locacao)
                        <tr>
                            <td class="fw-bold">#{{ $locacao->id }}</td>
                            <td>{{ $locacao->user->name ?? 'Não informado' }}</td>
                            <td><span class="badge bg-secondary">{{ $locacao->filme->titulo ?? 'Não informado' }}</span></td>
                            <td>{{ $locacao->funcionario->name ?? 'Não informado' }}</td>
                            <td>{{ \Carbon\Carbon::parse($locacao->data_locacao)->format('d/m/Y H:i') }}</td>
                            <td class="text-success fw-bold">R$ {{ number_of_format($locacao->valor_locacao, 2, ',', '.') }}</td>
                            <td>
                                @if($locacao->status == 'Pendente')
                                    <span class="badge bg-warning text-dark">{{ $locacao->status }}</span>
                                @else
                                    <span class="badge bg-success">{{ $locacao->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Nenhuma locação cadastrada no banco de dados ainda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
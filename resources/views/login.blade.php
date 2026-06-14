@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Locadora TNV</h2>
                <p class="text-muted">Faça login para acessar o painel administrativo</p>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    @if($errors->any())
                        <div class="alert alert-danger border-0 small">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login.autenticar') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold small text-uppercase">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="seu@email.com" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold small text-uppercase">Senha</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 fw-bold text-dark mb-2">Entrar no Sistema</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
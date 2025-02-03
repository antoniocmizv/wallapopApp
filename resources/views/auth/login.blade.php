@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-primary">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope-fill"></i> Correo Electrónico
                            </label>
                            <input type="email" name="email" id="email" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-key-fill"></i> Contraseña
                            </label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label class="form-check-label" for="remember">Recordarme</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-door-open"></i> Entrar
                        </button>
                    </form>
                    <p class="mt-3 text-center">¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
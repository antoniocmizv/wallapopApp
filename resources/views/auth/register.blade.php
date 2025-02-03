@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-success">
                <div class="card-header bg-success text-white">
                    <i class="bi bi-pencil-square"></i> Registrarse
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="bi bi-person-fill"></i> Nombre Completo
                            </label>
                            <input type="text" name="name" id="name" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope-fill"></i> Correo Electrónico
                            </label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-key-fill"></i> Contraseña
                            </label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">
                                <i class="bi bi-key"></i> Confirmar Contraseña
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-check-circle"></i> Registrarse
                        </button>
                    </form>
                    <p class="mt-3 text-center">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia Sesión aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
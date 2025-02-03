@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
<div class="container">
    <h3 class="my-4">Registrarse</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre Completo</label>
            <input type="text" name="name" id="name" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
    <p class="mt-3">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia Sesión aquí</a></p>
</div>
@endsection
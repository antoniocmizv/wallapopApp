<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wallapop')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Wallapop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('notifications.index') }}">Notificaciones ({{ Auth::user()->unreadNotifications->count() }})</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('sales.mine')}}">{{ Auth::user()->name }}</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="{{ route('sales.create') }}">Crear Anuncio</a>
                    </li>
                  <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button class="nav-link btn btn-link" type="submit">Salir</button>
                    </form>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                  </li>
                @endauth
              </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wallapop')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-shop-window"></i> Wallapop
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('notifications.index') }}">
                        <i class="bi bi-bell"></i> Notificaciones ({{ Auth::user()->unreadNotifications->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('sales.mine')}}">
                        <i class="bi bi-person"></i> {{ Auth::user()->name }}
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('sales.create') }}">
                        <i class="bi bi-plus-circle"></i> Crear Anuncio
                    </a>
                  </li>
                  <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button class="nav-link btn btn-link" type="submit">
                        <i class="bi bi-box-arrow-right"></i> Salir
                      </button>
                    </form>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i> Entrar
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="bi bi-pencil-square"></i> Registrarse
                    </a>
                  </li>
                @endauth
              </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
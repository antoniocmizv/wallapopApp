@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center text-success">
        <i class="bi bi-bell-fill"></i> Notificaciones
    </h1>
    @if(auth()->user()->notifications->isEmpty())
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> No tienes notificaciones.
        </div>
    @else
        <ul class="list-group">
            @foreach(auth()->user()->notifications as $notification)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-check-circle"></i> {{ $notification->data['message'] }}
                        <br>
                        <small class="text-muted">
                            <i class="bi bi-clock"></i> {{ $notification->created_at->diffForHumans() }}
                        </small>
                    </div>
                    <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="bi bi-check2-circle"></i>
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
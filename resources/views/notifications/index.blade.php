@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Notificaciones</h1>

    @if(auth()->user()->notifications->isEmpty())
        <div class="alert alert-info">No tienes notificaciones.</div>
    @else
        <ul class="list-group">
                    
            @foreach(auth()->user()->notifications as $notification)
                <div class="alert alert-info">
                    {{ $notification->data['message'] }}
                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        </ul>
    @endif
</div>
@endsection
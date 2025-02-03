<!-- filepath: /var/www/html/laraveles/wallapopApp/resources/views/sales/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow-sm" style="width: 350px;">
        <div class="img-container" style="height: 400px; overflow: hidden;">
            @if($sale->img)
                <img src="{{ asset('storage/' . $sale->img) }}" class="w-100 h-100" style="object-fit: cover;">
            @else
                <img src="{{ asset('images/default-thumbnail.jpg') }}" class="w-100 h-100" style="object-fit: cover;" alt="Sin imagen">
            @endif
        </div>
        <div class="card-body">
            <h5 class="card-title text-center">{{ $sale->product }}</h5>
            <ul class="list-unstyled">
                <li><strong>Precio:</strong> ${{ number_format($sale->price, 2) }}</li>
                <li><strong>Categoría:</strong> {{ $sale->category->name }}</li>
                <li><strong>Vendedor:</strong> {{ $sale->user->name }}</li>
            </ul>
            <div class="d-flex justify-content-between">
                <a href="{{ route('sales.index') }}" class="btn btn-secondary btn-sm">Volver</a>
                @if(!$sale->isSold && Auth::check() && $sale->user_id === Auth::id())
                    <form action="{{ route('sales.sell', $sale->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas marcarlo como vendido?');">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Comprar</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
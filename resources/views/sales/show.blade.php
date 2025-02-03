@extends('layouts.app')

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow" style="width: 350px;">
        <div class="img-container">
            @if($sale->images->count() > 0)
                <div id="saleImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sale->images as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image->route) }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Imagen de {{ $sale->product }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#saleImagesCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#saleImagesCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            @else
                <img src="{{ asset('images/default-thumbnail.jpg') }}" class="w-100" style="height: 400px; object-fit: cover;" alt="Sin imagen">
            @endif
        </div>
        <div class="card-body">
            <h5 class="card-title text-center text-primary">
                <i class="bi bi-tag-fill"></i> {{ $sale->product }}
            </h5>
            <ul class="list-unstyled">
                <li><strong>Precio:</strong> ${{ number_format($sale->price, 2) }}</li>
                <li><strong>Categoría:</strong> {{ $sale->category->name }}</li>
                <li><strong>Vendedor:</strong> {{ $sale->user->name }}</li>
            </ul>
            <div class="d-flex justify-content-between">
                <a href="{{ route('sales.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left-circle"></i> Volver
                </a>
                @if(!$sale->isSold && Auth::check())
                    <form action="{{ route('sales.sell', [$sale->id, Auth::id()]) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas marcarlo como vendido?');">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-cart-check"></i> Comprar
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
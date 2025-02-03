@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4 text-primary">
        <i class="bi bi-grid-3x3-gap-fill"></i> Anuncios Disponibles
    </h1>
    <!-- Filtro por categorías -->
    <form action="{{ route('home') }}" method="GET" class="mb-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <select name="category_id" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Todas las Categorías --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    @if($sales->isEmpty())
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> No hay anuncios disponibles en este momento.
        </div>
    @else
        <div class="row">
            @foreach($sales as $sale)
                <div class="col-md-4 my-3">
                    <div class="card shadow-sm">
                        @if($sale->img)
                            <img src="{{ asset('storage/' . $sale->img) }}" class="card-img-top" alt="{{ $sale->product }}">
                        @else
                            <img src="{{ asset('images/default-thumbnail.jpg') }}" class="card-img-top" alt="Sin imagen">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <i class="bi bi-tag-fill"></i> {{ $sale->product }}
                            </h5>
                            <p class="card-text">
                                <strong>Precio:</strong> ${{ number_format($sale->price, 2) }} <br>
                                <strong>Categoría:</strong> {{ $sale->category->name }}
                            </p>
                            <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-eye"></i> Ver más
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $sales->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>
@endsection
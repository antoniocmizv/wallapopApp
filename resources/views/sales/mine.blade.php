@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4 text-secondary">
        <i class="bi bi-person-lines-fill"></i> Mis Anuncios
    </h1>

    @if($sales->isEmpty())
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> No tienes anuncios creados.
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
                            <h5 class="card-title text-secondary">
                                <i class="bi bi-tag"></i> {{ $sale->product }}
                            </h5>
                            <p class="card-text">
                                <strong>Precio:</strong> ${{ number_format($sale->price, 2) }} <br>
                                <strong>Categoría:</strong> {{ $sale->category->name }}
                            </p>
                            <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-eye"></i> Ver más
                            </a>
                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-outline-primary btn-sm mt-2">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="d-inline mt-2" onsubmit="return confirm('¿Estás seguro de eliminar este anuncio?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash"></i> Borrar
                                </button>
                            </form>
                            @if($sale->isSold)
                                <form action="{{ route('sales.activate', $sale->id) }}" method="POST" class="mt-2" onsubmit="return confirm('¿Deseas reactivar este anuncio?');">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        <i class="bi bi-arrow-repeat"></i> Reactivar
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
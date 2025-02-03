@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow border-info">
        <div class="card-header bg-info text-white">
            <i class="bi bi-plus-circle"></i> Crear Anuncio
        </div>
        <div class="card-body">
            <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="product" class="form-label"><i class="bi bi-tag"></i> Producto</label>
                    <input type="text" class="form-control" id="product" name="product" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label"><i class="bi bi-card-text"></i> Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label"><i class="bi bi-currency-dollar"></i> Precio</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label"><i class="bi bi-list"></i> Categoría</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">
                        <i class="bi bi-images"></i> Imágenes
                    </label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple>
                </div>
                <button type="submit" class="btn btn-info w-100">
                    <i class="bi bi-check-circle"></i> Crear Anuncio
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
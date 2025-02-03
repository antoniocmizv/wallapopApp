
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4 text-primary">
        <i class="bi bi-pencil-square"></i> Editar Anuncio
    </h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('sales.update', $sale->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="product" class="form-label">
                        <i class="bi bi-tag"></i> Producto
                    </label>
                    <input type="text" name="product" id="product" class="form-control" value="{{ old('product', $sale->product) }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">
                        <i class="bi bi-card-text"></i> Descripción
                    </label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $sale->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">
                        <i class="bi bi-currency-dollar"></i> Precio
                    </label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price', $sale->price) }}" required>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">
                        <i class="bi bi-list"></i> Categoría
                    </label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $sale->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Puedes agregar un campo para subir nuevas imágenes, si lo deseas -->
                <div class="mb-3">
                    <label for="images" class="form-label">
                        <i class="bi bi-images"></i> Actualizar Imágenes (opcional)
                    </label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-check-circle"></i> Actualizar Anuncio
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
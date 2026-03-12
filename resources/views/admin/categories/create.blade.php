@extends('layouts.app')

@section('title', 'Nueva Categoría - Admin')

@section('content')

<a href="{{ route('admin.categories.index') }}" class="back-link">← Volver a Categorías</a>

<h1 style="text-align: center; margin-bottom: 30px;">🏷️ Crear Nueva Categoría</h1>

<div class="form-container">
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre de la Categoría</label>
            <input 
                type="text" 
                id="name"
                name="name" 
                value="{{ old('name') }}"
                placeholder="Ej: Electrónica, Ropa, Hogar..."
                required
            >
            @error('name')
                <span style="color: #0052a3; font-size: 12px; display: block; margin-top: 5px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="btn-group" style="gap: 10px;">
            <button type="submit" class="btn" style="flex: 1; padding: 12px; font-size: 15px;">
                ✓ Guardar Categoría
            </button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary" style="flex: 1; padding: 12px; text-align: center; font-size: 15px;">
                ✕ Cancelar
            </a>
        </div>
    </form>
</div>

@endsection

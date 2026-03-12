@extends('layouts.app')

@section('title', 'Vender Producto - TIENDA AZUL')

@section('content')

<h1 style="text-align: center; margin-bottom: 30px;">✨ Vender tu Producto</h1>

<div class="form-container">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Nombre del Producto</label>
                    <input 
                        type="text" 
                        id="name"
                        name="name" 
                        value="{{ old('name') }}"
                        placeholder="Ej: Auriculares Inalámbricos"
                        
                    >
                    @error('name')
                        <span style="color: #0052a3; font-size: 12px; display: block; margin-top: 5px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Precio (USD)</label>
                    <input 
                        type="number" 
                        id="price"
                        step="0.01" 
                        name="price"
                        value="{{ old('price') }}"
                        placeholder="Ej: 29.99"
                        
                    >
                    @error('price')
                        <span style="color: #0052a3; font-size: 12px; display: block; margin-top: 5px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">Categoría</label>
                    <select id="category_id" name="category_id"  style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; background-color: white;">
                        <option value="" disabled selected>Selecciona una categoría</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')

                        <span style="color: #0052a3; font-size: 12px; display: block; margin-top: 5px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Imagen del Producto</label>
                    <input 
                        type="file" 
                        id="image"
                        name="image" 
                        accept="image/*"
                    >
                    @error('image')

                        <span style="color: #0052a3; font-size: 12px; display: block; margin-top: 5px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="details">Descripción del Producto</label>
                    <textarea 
                        id="details"
                        name="details" 
                        rows="8" 
                        placeholder="Describe todas las características, especificaciones, materiales, etc."
                        
                    >{{ old('details') }}</textarea>
                    @error('details')
                    
                        <span style="color: #0052a3; font-size: 12px; display: block; margin-top: 5px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="btn-group" style="gap: 10px;">
                    <button type="submit" class="btn" style="flex: 1; padding: 12px; font-size: 15px;">
                        ✓ Publicar Producto
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary" style="flex: 1; padding: 12px; text-align: center; font-size: 15px;">
                        ✕ Cancelar
                    </a>
                </div>
            </form>
        </div>

@endsection

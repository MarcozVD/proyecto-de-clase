<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vender Producto - TIENDA AZUL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    @include('layouts.navbar')

    <div class="container">
        <h1 style="text-align: center; margin-bottom: 30px;">✨ Vender tu Producto</h1>

        <div class="form-container">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nombre del Producto</label>
                    <input 
                        type="text" 
                        id="name"
                        name="name" 
                        value="{{ old('name') }}"
                        placeholder="Ej: Auriculares Inalámbricos"
                        required
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
                        required
                    >
                    @error('price')
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
                        required
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
    </div>

    @include('layouts.footer')

</body>
</html>

@extends('layouts.app')

@section('title', 'Tienda de Productos - TIENDA AZUL')

@section('content')

<div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
    <h1 style="margin: 0;">🔥 Ofertas del Día</h1>
    <a href="{{ route('products.create') }}" class="btn">+ Agregar Producto</a>
</div>

@if($products->isEmpty())
    <div class="card" style="text-align: center; padding: 80px 20px;">
        <h2 style="margin-bottom: 10px;">📭 No hay productos</h2>
        <p style="margin: 15px 0; color: #999; font-size: 14px;">Sé el primero en agregar un producto increíble</p>
        <a href="{{ route('products.create') }}" class="btn" style="margin-top: 20px;">+ Crear Producto</a>
    </div>
@else
    <div class="grid">
        @foreach($products as $product)
            <div class="card">
                <div class="product-image">📦</div>
                
                <div class="product-info">
                    <div class="product-name">{{ $product->name }}</div>
                    
                    <div class="product-price">
                        <span class="price-current">${{ number_format($product->price, 2) }}</span>
                        <span class="price-original">${{ number_format($product->price * 1.3, 2) }}</span>
                    </div>

                    <div class="product-rating">
                        <span class="stars">★★★★★</span> (248)
                    </div>

                    <a href="{{ route('products.show', $product) }}" class="btn-view">Ver</a>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
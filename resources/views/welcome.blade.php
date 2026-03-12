@extends('layouts.app')

@section('title', 'Bienvenido a TIENDA AZUL - Tu Tienda de Confianza')

@section('content')

<!-- Hero Section -->
<div class="hero">
    <h1>✨ Descubre lo Mejor para Ti</h1>
    <p>Calidad premium, precios increíbles y envíos rápidos en un solo lugar. Todo lo que buscas, a un clic de distancia.</p>
    <div style="display: flex; gap: 15px; justify-content: center;">
        <a href="{{ route('products.index') }}" class="btn">🚀 Explorar Tienda</a>
    </div>
</div>

<!-- Categorías -->
<div class="section-title">
    <h2>🎯 Nuestras Categorías</h2>
    <p style="color: #666;">Encuentra exactamente lo que necesitas</p>
</div>

<div class="category-badges">
    @foreach($categories as $category)
        <a href="#" class="category-badge">
            {{ $category->name }}
        </a>
    @endforeach
</div>

<!-- Featured Products -->
<div class="section-title">
    <h2>🔥 Recién Llegados</h2>
    <p style="color: #666;">Echa un vistazo a nuestros últimos ingresos</p>
</div>

<div class="grid">
    @foreach($featuredProducts as $product)
        <div class="card">
            <div class="product-image">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                    📦
                @endif
            </div>
            
            <div class="product-info">
                <div class="product-name">{{ $product->name }}</div>
                
                <div class="product-price">
                    <span class="price-current">${{ number_format($product->price, 2) }}</span>
                </div>

                <a href="{{ route('products.show', $product) }}" class="btn-view">Ver Detalles</a>
            </div>
        </div>
    @endforeach
</div>

<div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('products.index') }}" style="color: #0052a3; font-weight: 700; text-decoration: none;">Ver todos los productos →</a>
</div>

<!-- Beneficios -->
<div class="benefits">
    <div class="benefit-card">
        <span class="benefit-icon">🚚</span>
        <h3>Envío Rápido</h3>
        <p>Entregamos tus pedidos en tiempo récord directamente a tu puerta.</p>
    </div>
    <div class="benefit-card">
        <span class="benefit-icon">🛡️</span>
        <h3>Compra Segura</h3>
        <p>Tus datos siempre protegidos con los mejores estándares de seguridad.</p>
    </div>
    <div class="benefit-card">
        <span class="benefit-icon">⭐</span>
        <h3>Calidad Garantizada</h3>
        <p>Solo ofrecemos productos que superan nuestros controles de calidad.</p>
    </div>
</div>

@endsection

<!-- NAVBAR -->
<nav class="navbar">
    <div class="navbar-brand">🛍️ TIENDA AZUL</div>
    <div class="navbar-links">
        <a href="{{ route('products.index') }}">Comprar</a>
        <a href="{{ route('admin.products.index') }}">Admin</a>
        <a href="{{ route('cart.index') }}" style="position: relative; display: flex; align-items: center; gap: 5px;">
            🛒 Carrito
            @if(session('cart') && count(session('cart')) > 0)
                <span style="background: #cc0000; color: white; border-radius: 50%; padding: 2px 6px; font-size: 10px; font-weight: 700; position: absolute; top: -8px; right: -12px;">
                    {{ count(session('cart')) }}
                </span>
            @endif
        </a>
    </div>
</nav>

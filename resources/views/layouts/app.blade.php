<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-brand">🛍️ TIENDA AZUL</div>
        <div class="navbar-links">
            <a href="{{ route('products.index') }}">Comprar</a>
            <a href="{{ route('products.create') }}">+ Vender</a>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <div class="container">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                ✓ {{ $message }}
            </div>
        @endif

        @yield('content')
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <p><strong>TIENDA AZUL</strong> - La mejor plataforma de compras</p>
        <p>&copy; 2026 Todos los derechos reservados</p>
        <p>Envío gratis | Devoluciones sin costo | Compra segura</p>
    </footer>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, #0052a3 0%, #0066cc 100%);
            padding: 12px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            box-shadow: 0 2px 8px rgba(0, 82, 163, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: 0.2s ease;
            padding: 6px 12px;
            border-radius: 4px;
        }

        .navbar a:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }

        /* CONTENIDO */
        .container {
            padding: 15px;
            min-height: calc(100vh - 120px);
            max-width: 1400px;
            margin: 0 auto;
        }

        /* FOOTER */
        .footer {
            background: linear-gradient(135deg, #0052a3 0%, #0066cc 100%);
            color: white;
            text-align: center;
            padding: 30px 15px;
            margin-top: 30px;
            font-size: 12px;
            line-height: 1.8;
        }

        .footer p {
            margin: 5px 0;
        }

        /* BOTONES */
        .btn {
            background: linear-gradient(135deg, #0052a3 0%, #0066cc 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: 0.2s ease;
            display: inline-block;
            box-shadow: 0 2px 4px rgba(0, 82, 163, 0.2);
        }

        .btn:hover {
            background: linear-gradient(135deg, #003d7a 0%, #004fa3 100%);
            box-shadow: 0 4px 8px rgba(0, 82, 163, 0.3);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #333;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary:hover {
            background: #e0e0e0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        /* CARD PRODUCTO */
        .card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: 0.2s ease;
            border: 1px solid #e8eaed;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 82, 163, 0.15);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 12px;
            margin-top: 20px;
        }

        .product-image {
            width: 100%;
            height: 150px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            overflow: hidden;
        }

        .product-info {
            padding: 10px;
        }

        .product-name {
            font-size: 12px;
            color: #333;
            margin-bottom: 6px;
            font-weight: 500;
            line-height: 1.4;
            height: 28px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .product-price {
            display: flex;
            align-items: baseline;
            gap: 4px;
            margin-bottom: 8px;
        }

        .price-current {
            color: #0052a3;
            font-weight: 700;
            font-size: 14px;
        }

        .price-original {
            color: #999;
            font-size: 11px;
            text-decoration: line-through;
        }

        .price-discount {
            background: #4caf50;
            color: white;
            font-size: 10px;
            padding: 2px 4px;
            border-radius: 2px;
            font-weight: 600;
        }

        .product-rating {
            font-size: 11px;
            color: #999;
            margin-bottom: 8px;
        }

        .stars {
            color: #2196f3;
        }

        .btn-view {
            width: 100%;
            padding: 6px;
            background: linear-gradient(135deg, #0052a3 0%, #0066cc 100%);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-view:hover {
            background: linear-gradient(135deg, #003d7a 0%, #004fa3 100%);
        }

        /* FORMULARIOS */
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
            color: #0052a3;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: 0.2s ease;
            font-family: inherit;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #0066cc;
            box-shadow: 0 0 0 2px rgba(0, 102, 204, 0.1);
        }

        textarea {
            resize: vertical;
            font-family: inherit;
        }

        /* TÍTULOS */
        h1 {
            color: #0052a3;
            margin-bottom: 15px;
            font-size: 24px;
            font-weight: 700;
        }

        h2 {
            color: #0052a3;
            margin: 15px 0;
            font-size: 18px;
            font-weight: 700;
        }

        h3 {
            color: #0052a3;
            margin: 10px 0;
            font-size: 14px;
            font-weight: 600;
        }

        /* MENSAJE DE ÉXITO */
        .alert {
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            border-left: 4px solid;
            font-size: 14px;
        }

        .alert-success {
            background-color: #e8f5e9;
            border-color: #4caf50;
            color: #1b5e20;
        }

        /* PRODUCTO DETALLES */
        .product-detail-container {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .product-detail-image {
            width: 100%;
            max-width: 400px;
            height: 400px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 150px;
        }

        .product-detail-info {
            padding: 30px;
        }

        .price-tag {
            font-size: 32px;
            color: #0052a3;
            font-weight: 800;
            margin: 20px 0;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .back-link {
            color: #0052a3;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            display: inline-block;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 10px;
            }

            .navbar-links {
                flex-direction: column;
                width: 100%;
                gap: 8px;
            }

            .container {
                padding: 10px;
            }

            h1 {
                font-size: 20px;
            }

            .grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
                gap: 8px;
            }

            .form-container {
                padding: 20px;
            }
        }
    </style>
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

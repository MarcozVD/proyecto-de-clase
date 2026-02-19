<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'TIENDA AZUL')</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    @include('layouts.navbar')

    <div class="container">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                ✓ {{ $message }}
            </div>
        @endif

        @if($message = Session::get('error'))
            <div class="alert alert-danger">
                ✗ {{ $message }}
            </div>
        @endif

        @yield('content')
    </div>

    @include('layouts.footer')

</body>
</html>

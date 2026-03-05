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

    @include('layouts.navbar')

    <!-- CONTENIDO -->
    <div class="container">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                ✓ {{ $message }}
            </div>
        @endif

        @yield('content')
    </div>

    @include('layouts.footer')

</body>
</html>

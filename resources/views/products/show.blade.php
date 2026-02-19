<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }} - TIENDA AZUL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    @include('layouts.navbar')

    <div class="container">
        <a href="{{ route('products.index') }}" class="back-link">← Volver a Productos</a>

        <div class="product-detail-container" style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; padding: 30px;">
            <!-- Imagen -->
            <div class="product-detail-image">📦</div>

            <!-- Información -->
            <div class="product-detail-info" style="padding: 0;">
                <h1 style="margin-top: 0; font-size: 26px;">{{ $product->name }}</h1>

                <!-- Rating -->
                <div style="color: #999; font-size: 13px; margin-bottom: 20px;">
                    <span style="color: #FFC107;">★★★★★</span> 4.8 (2,456 reseñas) | 
                    <span style="color: #27ae60;">1,234 vendidos</span>
                </div>

                <!-- Precio -->
                <div style="background: #f5f5f5; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                    <div style="display: flex; align-items: baseline; gap: 10px; margin-bottom: 10px;">
                        <div class="price-tag" style="margin: 0;">$ {{ number_format($product->price, 2) }}</div>
                        <div style="color: #999; text-decoration: line-through; font-size: 16px;">
                            $ {{ number_format($product->price * 1.3, 2) }}
                        </div>
                    </div>
                    <div style="color: #0052a3; font-weight: 600; font-size: 13px;">
                        ⚡ ¡Ahorra 30%!
                    </div>
                </div>

                <!-- Envío gratis -->
                <div style="background: #f0faf0; padding: 15px; border-radius: 8px; border-left: 4px solid #27ae60; margin-bottom: 20px; font-size: 13px;">
                    📦 <strong>Envío GRATIS</strong> | Llega en 3-5 días | 
                    <span style="color: #27ae60;">Devoluciones gratis hasta 30 días</span>
                </div>

                <!-- Detalles del producto -->
                <h2 style="font-size: 16px; margin-bottom: 12px;">Detalles del Producto</h2>
                <p style="color: #666; line-height: 1.8; font-size: 14px; margin-bottom: 20px;">
                    {{ $product->details }}
                </p>

                <!-- Info adicional -->
                <div style="background: #f5f5f5; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-size: 12px;">
                    <div style="margin-bottom: 8px;"><strong>Disponibilidad:</strong> <span style="color: #27ae60;">En stock (234 unidades)</span></div>
                    <div style="margin-bottom: 8px;"><strong>Publicado:</strong> {{ $product->created_at->format('d/m/Y') }}</div>
                    <div><strong>Actualizado:</strong> {{ $product->updated_at->format('d/m/Y H:i') }}</div>
                </div>

                <!-- Botones de acción -->
                <div class="btn-group" style="gap: 10px;">
                    <button class="btn" style="flex: 1; padding: 14px; font-size: 15px; font-weight: 700;">
                        🛒 COMPRAR AHORA
                    </button>
                    <button class="btn btn-secondary" style="flex: 1; padding: 14px; font-size: 15px; font-weight: 700;">
                        ❤️ GUARDAR
                    </button>
                </div>

                <!-- Botones secundarios -->
                <div class="btn-group" style="gap: 10px; margin-top: 10px;">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary" style="flex: 1; padding: 10px; text-align: center; font-size: 14px;">
                        ← Continuar Comprando
                    </a>
                    <a href="{{ route('products.create') }}" class="btn" style="flex: 1; padding: 10px; text-align: center; font-size: 14px;">
                        + Vender Similar
                    </a>
                </div>
            </div>
        </div>

        <!-- Reseñas (Sección decorativa) -->
        <div style="max-width: 1000px; margin: 40px auto; padding: 0 15px;">
            <h2 style="font-size: 18px; margin-bottom: 20px;">⭐ Reseñas de Compradores</h2>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
                <div style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <div style="color: #FFC107; margin-bottom: 8px;">★★★★★</div>
                    <p style="font-size: 13px; line-height: 1.6;">Producto excelente, llegó rápido y en perfecto estado. Muy recomendado.</p>
                    <p style="font-size: 11px; color: #999; margin-top: 8px;">Juan M. - Hace 2 días</p>
                </div>
                <div style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <div style="color: #FFC107; margin-bottom: 8px;">★★★★★</div>
                    <p style="font-size: 13px; line-height: 1.6;">Super satisfecho con la compra. La calidad es muy buena.</p>
                    <p style="font-size: 11px; color: #999; margin-top: 8px;">María L. - Hace 1 semana</p>
                </div>
                <div style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <div style="color: #FFC107; margin-bottom: 8px;">★★★★☆</div>
                    <p style="font-size: 13px; line-height: 1.6;">Bueno, aunque me hubiera gustado tener más opciones de color.</p>
                    <p style="font-size: 11px; color: #999; margin-top: 8px;">Carlos R. - Hace 3 días</p>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

</body>
</html>

@extends('layouts.app')

@section('title', 'Tu Carrito - TIENDA AZUL')

@section('content')

<h1 style="margin-bottom: 30px;">🛒 Tu Carrito de Compras</h1>

@if(session('cart') && count(session('cart')) > 0)
    <div style="display: grid; grid-template-columns: 1fr 350px; gap: 30px;">
        <!-- Lista de productos -->
        <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead style="background: #f8f9fa; border-bottom: 2px solid #eee;">
                    <tr>
                        <th style="padding: 15px;">Producto</th>
                        <th style="padding: 15px;">Precio</th>
                        <th style="padding: 15px;">Cantidad</th>
                        <th style="padding: 15px;">Subtotal</th>
                        <th style="padding: 15px; text-align: right;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $details)
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 15px; display: flex; align-items: center; gap: 15px;">
                                <div style="width: 60px; height: 60px; background: #f0f0f0; border-radius: 8px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                    @if($details['image'])
                                        <img src="{{ asset('storage/' . $details['image']) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        📦
                                    @endif
                                </div>
                                <div>
                                    <div style="font-weight: 600;">{{ $details['name'] }}</div>
                                </div>
                            </td>
                            <td style="padding: 15px;">${{ number_format($details['price'], 2) }}</td>
                            <td style="padding: 15px;">
                                <form action="{{ route('cart.update', $id) }}" method="POST" style="display: flex; align-items: center; gap: 10px;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" style="width: 60px; padding: 5px; border: 1px solid #ddd; border-radius: 4px;">
                                    <button type="submit" style="background: none; border: none; cursor: pointer; color: #0052a3; font-size: 18px;" title="Actualizar">🔄</button>
                                </form>
                            </td>
                            <td style="padding: 15px; font-weight: 600;">${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                            <td style="padding: 15px; text-align: right;">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="btn-delete" style="padding: 6px 12px; font-size: 13px;">🗑️ Quitar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div style="padding: 20px; display: flex; justify-content: space-between; align-items: center;">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">← Seguir Comprando</a>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; color: #cc0000; cursor: pointer; font-size: 14px; text-decoration: underline;">Vaciar Carrito</button>
                </form>
            </div>
        </div>

        <!-- Resumen -->
        <div>
            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); padding: 25px; position: sticky; top: 20px;">
                <h2 style="font-size: 18px; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">Resumen de Compra</h2>
                
                <div style="display: flex; justify-content: space-between; margin-bottom: 15px; color: #666;">
                    <span>Subtotal</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
                
                <div style="display: flex; justify-content: space-between; margin-bottom: 15px; color: #27ae60; font-weight: 600;">
                    <span>Envío</span>
                    <span>GRATIS</span>
                </div>

                <div style="display: flex; justify-content: space-between; margin-top: 20px; padding-top: 20px; border-top: 2px solid #eee; font-size: 20px; font-weight: 800;">
                    <span>Total</span>
                    <span style="color: #0052a3;">${{ number_format($total, 2) }}</span>
                </div>

                <button class="btn" style="width: 100%; padding: 15px; margin-top: 25px; font-size: 16px; font-weight: 700;">
                    FINALIZAR COMPRA
                </button>
<div style="text-align: center; margin-top: 15px; font-size: 12px; color: #999;">
                    🔒 Compra segura y protegida
                </div>
            </div>
        </div>
    </div>
@else
    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); padding: 80px 20px; text-align: center;">
        <div style="font-size: 64px; margin-bottom: 20px;">🛒</div>
        <h2 style="margin-bottom: 15px;">Tu carrito está vacío</h2>
        <p style="color: #666; margin-bottom: 30px;">¡Explora nuestras ofertas y agrega algo increíble!</p>
        <a href="{{ route('products.index') }}" class="btn">Empezar a Comprar</a>
    </div>
@endif

@endsection

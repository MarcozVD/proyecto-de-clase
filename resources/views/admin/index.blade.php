@extends('layouts.app')

@section('title', 'Admin - Panel de Productos')

@section('content')

<div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
    <h1 style="margin: 0;">🛠️ Administrar Productos</h1>
    <a href="{{ route('products.create') }}" class="btn">+ Agregar Producto Nuevo</a>
</div>

@if(session('success'))
    <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif

@if($products->isEmpty())
    <div class="card" style="text-align: center; padding: 80px 20px;">
        <h2 style="margin-bottom: 10px;">📭 No hay productos para administrar</h2>
        <a href="{{ route('products.create') }}" class="btn" style="margin-top: 20px;">+ Crear Primer Producto</a>
    </div>
@else
    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead style="background: #f8f9fa; border-bottom: 2px solid #eee;">
                <tr>
                    <th style="padding: 15px;">Producto</th>
                    <th style="padding: 15px;">Categoría</th>
                    <th style="padding: 15px;">Precio</th>
                    <th style="padding: 15px; text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 15px; display: flex; align-items: center; gap: 10px;">
                            <div style="width: 40px; height: 40px; background: #f0f0f0; border-radius: 4px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    📦
                                @endif
                            </div>
                            <div>
                                <div style="font-weight: 600;">{{ $product->name }}</div>
                                <div style="font-size: 12px; color: #999;">ID: {{ $product->id }}</div>
                            </div>
                        </td>
                        <td style="padding: 15px;">
                            <span style="background: #e3f2fd; color: #0052a3; padding: 4px 10px; border-radius: 12px; font-size: 12px;">
                                {{ $product->category->name ?? 'Sin categoría' }}
                            </span>
                        </td>
                        <td style="padding: 15px; font-weight: 600;">
                            ${{ number_format($product->price, 2) }}
                        </td>
                        <td style="padding: 15px; text-align: right;">
                            <div style="display: flex; gap: 8px; justify-content: flex-end;">
                                <a href="{{ route('products.edit', $product) }}" class="btn-edit" style="text-decoration: none; padding: 6px 12px; font-size: 13px;">
                                    ✏️ Editar
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" style="padding: 6px 12px; font-size: 13px;" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                        🗑️ Borrar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection

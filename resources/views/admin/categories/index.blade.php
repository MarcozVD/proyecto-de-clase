@extends('layouts.app')

@section('title', 'Admin - Gestionar Categorías')

@section('content')

<div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
    <h1 style="margin: 0;">🏷️ Gestionar Categorías</h1>
    <div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary" style="margin-right: 10px;">← Volver a Productos</a>
        <a href="{{ route('admin.categories.create') }}" class="btn">+ Nueva Categoría</a>
    </div>
</div>

@if(session('success'))
    <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
        {{ session('error') }}
    </div>
@endif

<div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow: hidden;">
    <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead style="background: #f8f9fa; border-bottom: 2px solid #eee;">
            <tr>
                <th style="padding: 15px;">ID</th>
                <th style="padding: 15px;">Nombre</th>
                <th style="padding: 15px;">Productos Asociados</th>
                <th style="padding: 15px; text-align: right;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px; color: #999;">#{{ $category->id }}</td>
                    <td style="padding: 15px; font-weight: 600;">{{ $category->name }}</td>
                    <td style="padding: 15px;">
                        <span style="background: #f0f0f0; padding: 4px 10px; border-radius: 12px; font-size: 12px;">
                            {{ $category->products_count }} productos
                        </span>
                    </td>
                    <td style="padding: 15px; text-align: right;">
                        <div style="display: flex; gap: 8px; justify-content: flex-end;">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn-edit" style="text-decoration: none; padding: 6px 12px; font-size: 13px;">
                                ✏️ Editar
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" style="padding: 6px 12px; font-size: 13px;" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">
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

@endsection

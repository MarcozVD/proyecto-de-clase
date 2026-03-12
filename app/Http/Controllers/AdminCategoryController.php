<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->orderBy('id', 'desc')->get();
        return view("admin.categories.index", compact('categories'));
    }

    public function create()
    {
        return view("admin.categories.create");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name|max:255',
        ]);

        Category::create($validated);
        return redirect()->route('admin.categories.index')->with('success', 'Categoría creada correctamente');
    }

    public function edit(Category $category)
    {
        return view("admin.categories.edit", compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id . '|max:255',
        ]);

        $category->update($validated);
        return redirect()->route('admin.categories.index')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return redirect()->route('admin.categories.index')->with('error', 'No se puede eliminar una categoría que tiene productos asociados');
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Categoría eliminada correctamente');
    }
}

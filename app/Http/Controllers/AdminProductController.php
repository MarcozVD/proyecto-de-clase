<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','desc')->get();
        return view("admin.index", compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view("products.create", compact('categories'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'details' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        Product::create($validated);
        return redirect()->route('admin.products.index')->with('success', 'Producto creado correctamente');
    }

    public function edit(Product $product){
        $categories = Category::all();
        return view("products.edit", compact('product', 'categories'));
    }

    public function update(Request $request, Product $product){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'details' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        $product->update($validated);
        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product){
        if (method_exists($product, 'cardItems')) {
            $product->cardItems()->delete();
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado correctamente');
    }
}

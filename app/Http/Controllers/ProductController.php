<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        
        $products = Product::limit(50)->orderBy('id','asc')->get();
        
        return view("products.index",[
            'misProductos'=>$products
        ],compact('products'));
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
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
    }

    public function show(Product $product){
        return view("products.show", compact('product'));
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
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
    }
    public function destroy(Product $product){
        $product->cardItems()->delete();
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente');
    }   
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view("products.index", compact('products'));
    }

    public function create(){
        return view("products.create");
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'details' => 'required|string',
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
    }

    public function show(Product $product){
        return view("products.show", compact('product'));
    }
}

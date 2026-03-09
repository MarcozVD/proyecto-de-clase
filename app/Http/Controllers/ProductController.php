<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        
        $products = Product::limit(50)->orderBy('id','desc')->get();
        
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
}

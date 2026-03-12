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

    public function show(Product $product){
        return view("products.show", compact('product'));
    }
}

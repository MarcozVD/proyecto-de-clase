<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function __invoke()
    {
        $featuredProducts = Product::latest()->take(3)->get();
        $categories = Category::limit(20)->get();
        
        return view('welcome', compact('featuredProducts', 'categories'));
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', HomeController::class);

Route::prefix("product")->controller(ProductController::class)->group(function(){
    Route::get('/',"index")->name('products.index');
    Route::get('/create',"create")->name('products.create');
    Route::post('/',"store")->name('products.store');
    Route::get('/{product}',"show")->name('products.show');
});


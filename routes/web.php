<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', HomeController::class);

// Public product routes
Route::prefix("product")->controller(ProductController::class)->group(function(){
    Route::get('/',"index")->name('products.index');
    Route::get('/{product}',"show")->name('products.show');
});

// Admin routes
Route::prefix("admin")->group(function(){
    // Admin product routes
    Route::controller(App\Http\Controllers\AdminProductController::class)->group(function(){
        Route::get('/', "index")->name('admin.products.index');
        Route::get('/create',"create")->name('products.create');
        Route::post('/',"store")->name('products.store');
        Route::get('/{product}/edit',"edit")->name('products.edit');
        Route::put('/{product}',"update")->name('products.update');
        Route::delete('/{product}',"destroy")->name('products.destroy');
    });

    // Admin category routes
    Route::prefix("categories")->controller(App\Http\Controllers\AdminCategoryController::class)->group(function(){
        Route::get('/', "index")->name('admin.categories.index');
        Route::get('/create', "create")->name('admin.categories.create');
        Route::post('/', "store")->name('admin.categories.store');
        Route::get('/{category}/edit', "edit")->name('admin.categories.edit');
        Route::put('/{category}', "update")->name('admin.categories.update');
        Route::delete('/{category}', "destroy")->name('admin.categories.destroy');
    });
});


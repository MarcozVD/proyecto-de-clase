<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', HomeController::class);

Route::get('/product', [ProductController::class,"index"]);
Route::get('/product/create', [ProductController::class,"create"]);
Route::get('/product/{product}', [ProductController::class,"show"]);

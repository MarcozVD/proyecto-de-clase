<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [HomeController::class,"index"]);
Route::get('/product/create', [HomeController::class,"create"]);
Route::get('/product/{product}', [HomeController::class,"show"]);

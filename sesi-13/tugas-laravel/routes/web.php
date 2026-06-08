<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Models\Product;

// Rute halaman statis
Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);

// Rute Mengelola Produk (Controller Essentials)
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']); 

// Rute Cart & Order dengan Rate Limiting (TETAP DIPERTAHANKAN)
Route::middleware('throttle:60,1')->group(function () {
    Route::post('/cart/add/{id}', [OrderController::class, 'addToCart']);
    Route::get('/cart', [OrderController::class, 'cartIndex']);
    Route::get('/checkout', [OrderController::class, 'checkout']);
});
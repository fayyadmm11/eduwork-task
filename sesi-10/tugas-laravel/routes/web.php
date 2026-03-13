<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Models\Product;

// 1. Route Default bawaan Laravel
Route::get('/', function () {
    return view('welcome');
});

// --- PENERAPAN RATE LIMITING ---
// Middleware 'throttle:60,1' artinya maksimal 60 request per 1 menit dari 1 IP.
Route::middleware('throttle:60,1')->group(function () {
    
    // 2. Rute Dasar sesuai tugas
    Route::get('/products', [ProductController::class, 'index']);
    
    // Rute untuk memproses klik tombol tambah
    Route::post('/cart/add/{id}', [OrderController::class, 'addToCart']);
    
    // Rute untuk menampilkan UI Halaman Keranjang
    Route::get('/cart', [OrderController::class, 'cartIndex']);

    Route::get('/checkout', [OrderController::class, 'checkout']);

    // --- PENERAPAN ROUTE MODEL BINDING ---
    // Rute untuk melihat detail 1 produk spesifik (misal: /products/1)
    Route::get('/products/{product}', function (Product $product) {
        // Laravel otomatis mencari data ke database berdasarkan ID di URL
        return response()->json($product);
    });

});
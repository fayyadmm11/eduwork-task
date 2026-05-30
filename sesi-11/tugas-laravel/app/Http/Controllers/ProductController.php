<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <--- Wajib dipanggil agar Controller kenal dengan Model

class ProductController extends Controller
{
    // 1. Mengelola Halaman Semua Produk (Katalog)
    public function index()
    {
        // Ambil semua data dari tabel products (Sama seperti SELECT * FROM products)
        $products = Product::all(); 
        
        // Kirim data tersebut ke file tampilan (view) bernama 'products.index'
        return view('products.index', compact('products'));
    }

    // 2. Mengelola Halaman Detail Satu Produk (Route Model Binding masuk ke sini)
    public function show(Product $product)
    {
        // Alih-alih me-return JSON, kita kirim ke Blade!
        return view('products.show', compact('product'));
    }
}
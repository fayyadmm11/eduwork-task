<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <--- Wajib dipanggil agar Controller kenal dengan Model

class ProductController extends Controller
{
    // Method untuk menampilkan semua produk di halaman Katalog
    public function index()
    {
        // Ambil semua data dari tabel products (Sama seperti SELECT * FROM products)
        $products = Product::all(); 
        
        // Kirim data tersebut ke file tampilan (view) bernama 'products.index'
        return view('products.index', compact('products'));
    }
}
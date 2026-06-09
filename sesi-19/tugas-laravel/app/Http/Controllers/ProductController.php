<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <--- Wajib dipanggil agar Controller kenal dengan Model

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(4);

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->increment('views');
        $product->load('category');

        return view('products.show', compact('product'));
    }
}
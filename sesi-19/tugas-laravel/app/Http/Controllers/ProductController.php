<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

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

    public function create()
    {
        $categories = ProductCategory::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name'        => 'required|string|max:200',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }
}
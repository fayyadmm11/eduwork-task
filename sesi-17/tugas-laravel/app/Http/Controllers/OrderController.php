<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Panggil model Product
use App\Models\Order;   // Panggil model Order untuk menyimpan data ke tabel orders

class OrderController extends Controller
{
    // 1. Menambahkan barang ke Session Keranjang
    public function addToCart($id)
    {
        $product = Product::findOrFail($id); // Cari barang di MySQL
        $cart = session()->get('cart', []);  // Ambil data keranjang saat ini

        // Jika barang sudah ada di keranjang, tambah jumlahnya (quantity)
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika belum ada, masukkan sebagai barang baru
            $cart[$id] = [
                "nama" => $product->nama_produk,
                "quantity" => 1,
                "harga" => $product->harga
            ];
        }

        session()->put('cart', $cart); // Simpan kembali ke Session
        return redirect('/cart');      // Lempar pengunjung ke halaman keranjang
    }

    // 2. Menampilkan UI Halaman Keranjang
    public function cartIndex()
    {
        $cart = session()->get('cart', []); // Ambil isi keranjang
        return view('cart.index', compact('cart')); // Kirim ke file View
    }

    // 3. Logika untuk memproses Checkout
    public function checkout()
    {
        $cart = session()->get('cart');

        // Cegah checkout jika keranjang kosong
        if (!$cart) {
            return redirect('/products');
        }

        // Looping semua barang di keranjang dan masukkan satu per satu ke tabel orders
        // Looping semua barang di keranjang
        foreach ($cart as $product_id => $item) {
            
            // 1. Catat pesanan ke tabel orders
            $order = new Order();
            $order->user_id = 1;
            $order->product_id = $product_id;
            $order->quantity = $item['quantity'];
            $order->total = $item['harga'] * $item['quantity'];
            $order->save(); // Simpan pesanan

            // 2. Kurangi stok di tabel products
            $product = Product::find($product_id); // Cari produk berdasarkan ID
            if ($product) {
                $product->stok = $product->stok - $item['quantity']; // Kurangi stok dengan jumlah beli
                $product->save(); // Simpan sisa stok kembali ke database
            }
        }

        session()->forget('cart');

        return redirect('/products');
    }
}
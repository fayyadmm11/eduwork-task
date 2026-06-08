@extends('layouts.main') @section('title', 'Katalog Produk')

@section('content') <h2 class="mb-4 text-center">Katalog Produk Toko Fayyad</h2>

    <div class="row g-4">
        @foreach ($products as $barang)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">{{ $barang->kategori }}</span>
                        <h5 class="card-title">
                            <a href="/products/{{ $barang->id }}" class="text-decoration-none text-dark">{{ $barang->nama_produk }}</a>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-success">Rp {{ number_format($barang->harga, 0, ',', '.') }}</h6>
                        <p class="card-text text-muted small">{{ $barang->deskripsi }}</p>
                        <p class="card-text"><small>Stok: {{ $barang->stok }}</small></p>
                        
                        <form action="/cart/add/{{ $barang->id }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100 mt-3">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
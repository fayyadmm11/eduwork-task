@extends('layouts.main')

@section('title', 'Katalog Produk')

@section('content')
<h2 class="mb-4 text-center">Katalog Produk Toko Fayyad</h2>

<div class="row g-4">
    @forelse ($products as $product)
        <div class="col-md-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-secondary mb-2 align-self-start">
                        {{ $product->category->name ?? 'Uncategorized' }}
                    </span>
                    <h5 class="card-title">
                        <a href="/products/{{ $product->id }}" class="text-decoration-none text-dark">
                            {{ $product->name }}
                        </a>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-success">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </h6>
                    <p class="card-text text-muted small grow">{{ $product->description }}</p>
                    <p class="card-text"><small class="text-muted">Stok: {{ $product->stock }}</small></p>
                    <form action="/cart/add/{{ $product->id }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100 mt-2">Tambah ke Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p class="text-center text-muted">Belum ada produk tersedia.</p>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-5">
    {{ $products->links() }}
</div>
@endsection

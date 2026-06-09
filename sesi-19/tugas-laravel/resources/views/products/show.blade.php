@extends('layouts.main')

@section('title', $product->name)

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <a href="/products" class="btn btn-outline-secondary btn-sm mb-3">&larr; Kembali ke Katalog</a>

        <div class="card shadow-sm">
            <div class="card-body">
                <span class="badge bg-secondary mb-2">
                    {{ $product->category->name ?? 'Uncategorized' }}
                </span>
                <h2 class="card-title">{{ $product->name }}</h2>
                <h4 class="text-success mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
                <p class="card-text">{{ $product->description }}</p>
                <p class="text-muted">Stok tersedia: <strong>{{ $product->stock }}</strong></p>

                <form action="/cart/add/{{ $product->id }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm text-center">
        <h1 class="display-5 fw-bold">Selamat Datang di Toko Fayyad</h1>
        <p class="col-md-8 mx-auto fs-4">Temukan barang kebutuhan Anda dengan harga terbaik di sini.</p>
        <a href="/products" class="btn btn-primary btn-lg">Mulai Belanja</a>
    </div>
@endsection
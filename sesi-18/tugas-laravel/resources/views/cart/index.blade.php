@extends('layouts.main')

@section('title', 'Keranjang Belanja')

@section('content')
    <h2 class="mb-4 text-center">Keranjang Belanja Anda</h2>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah (Qty)</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalSemua = 0; @endphp
                    
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $item)
                            @php 
                                $subtotal = $item['harga'] * $item['quantity'];
                                $totalSemua += $subtotal;
                            @endphp
                            <tr>
                                <td class="text-start">{{ $item['nama'] }}</td>
                                <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Keranjang Anda masih kosong. Ayo belanja!</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total Pembayaran:</th>
                        <th class="text-success fs-5">Rp {{ number_format($totalSemua, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>

            <div class="d-flex justify-content-between mt-4">
                <a href="/products" class="btn btn-outline-secondary">
                    &larr; Lanjut Belanja
                </a>
                @if(session('cart'))
                    <a href="/checkout" class="btn btn-success fw-bold">
                        Checkout Sekarang &rarr;
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
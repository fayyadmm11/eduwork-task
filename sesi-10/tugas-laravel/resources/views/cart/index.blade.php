<!DOCTYPE html>
<html lang="id">
<head>
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Keranjang Belanja Anda</h2>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
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
                                <td>{{ $item['nama'] }}</td>
                                <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">Keranjang Anda masih kosong.</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total Pembayaran:</th>
                        <th>Rp {{ number_format($totalSemua, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>

            <div class="d-flex justify-content-between mt-3">
                <a href="/products" class="btn btn-outline-secondary">Lanjut Belanja</a>
                @if(session('cart'))
                    <a href="/checkout" class="btn btn-success">Checkout Sekarang</a>
                @endif
            </div>
        </div>
    </div>
</div>

</body>
</html>
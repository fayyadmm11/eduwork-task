<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Katalog Produk</h2>

    <div class="row g-4">
        @foreach ($products as $barang)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">{{ $barang->kategori }}</span>
                        <h5 class="card-title">{{ $barang->nama_produk }}</h5>
                        <h6 class="card-subtitle mb-2 text-success">Rp {{ number_format($barang->harga, 0, ',', '.') }}</h6>
                        <p class="card-text text-muted small">{{ $barang->deskripsi }}</p>
                        <p class="card-text"><small>Stok: {{ $barang->stok }}</small></p>
                        
                        <form action="/cart/add/{{ $barang->id }}" method="POST">
                            @csrf <button type="submit" class="btn btn-primary w-100 mt-3">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
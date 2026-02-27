<?php
// TUGAS 1: Deklarasi variabel untuk menampung pesan
$pesan_error = "";
$pesan_sukses = "";

// Mengecek apakah form sudah dikirimkan oleh pengguna (menggunakan metode POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Mengambil data yang diketik di form dan memasukkannya ke dalam variabel
    $nama_produk = $_POST["nama_produk"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];

    // TUGAS 3: Validasi Sederhana menggunakan if-else dan operator logika OR (||)
    // Fungsi empty() mengecek apakah variabel tersebut kosong
    if (empty($nama_produk) || empty($harga) || empty($deskripsi)) {
        $pesan_error = "Gagal: Semua kolom (Nama, Harga, Deskripsi) wajib diisi!";
    } else {
        // Jika lolos validasi (tidak ada yang kosong)
        // Di sinilah nanti kita akan meletakkan kode SQL INSERT INTO ke database
        $pesan_sukses = "Berhasil: Produk '$nama_produk' tervalidasi dan siap disimpan ke database.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Toko Fayyad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah Produk Baru</h5>
                </div>
                <div class="card-body">

                    <?php if (!empty($pesan_error)): ?>
                        <div class="alert alert-danger"><?= $pesan_error ?></div>
                    <?php endif; ?>

                    <?php if (!empty($pesan_sukses)): ?>
                        <div class="alert alert-success"><?= $pesan_sukses ?></div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Produk</label>
                            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">Simpan Produk</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
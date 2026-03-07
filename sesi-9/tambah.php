<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    
    // Proses Upload Gambar
    $nama_file = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    
    // Buat nama file unik agar tidak bentrok jika namanya sama
    $gambar_baru = time() . "_" . $nama_file;
    $folder_tujuan = "uploads/" . $gambar_baru;

    if (move_uploaded_file($tmp_name, $folder_tujuan)) {
        // Jika file berhasil dipindah ke folder uploads, simpan datanya ke database
        // (Stok dan kategori diisi default sementara)
        $sql = "INSERT INTO products (nama_produk, harga, deskripsi, stok, kategori, gambar) 
                VALUES ('$nama', $harga, '$deskripsi', 10, 'Lainnya', '$gambar_baru')";
        
        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Produk berhasil ditambahkan!'); window.location='admin.php';</script>";
        } else {
            echo "Error Database: " . mysqli_error($koneksi);
        }
    } else {
        echo "<script>alert('Gagal mengunggah gambar!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container" style="max-width: 600px;">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="text-center mb-4">Tambah Produk</h3>
                
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" name="nama_produk" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Produk <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Harga Produk (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Upload Gambar <span class="text-danger">*</span></label>
                        <input type="file" name="gambar" class="form-control" accept="image/*" required>
                        <div class="form-text">Format yang didukung: JPG, PNG, JPEG.</div>
                    </div>
                    
                    <button type="submit" class="btn btn-success w-100 mt-2">Tambah Produk</button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
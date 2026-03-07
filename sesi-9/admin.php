<?php
require 'koneksi.php';

// Logika untuk DELETE produk
if (isset($_GET['hapus'])) {
    $id_hapus = $_GET['hapus'];
    
    // Opsional tapi penting: Hapus juga file fisiknya dari folder uploads
    $cari_gambar = mysqli_query($koneksi, "SELECT gambar FROM products WHERE id = $id_hapus");
    $data_gambar = mysqli_fetch_assoc($cari_gambar);
    if (file_exists("uploads/" . $data_gambar['gambar'])) {
        unlink("uploads/" . $data_gambar['gambar']); // Perintah hapus file
    }

    // Hapus data dari database
    mysqli_query($koneksi, "DELETE FROM products WHERE id = $id_hapus");
    echo "<script>alert('Data berhasil dihapus'); window.location='admin.php';</script>";
}

// Logika READ produk
$result = mysqli_query($koneksi, "SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola Produk (Admin)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h2>Daftar Produk (Kelola Data)</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Produk Baru</a>
        
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td>
                        <img src="uploads/<?= $row['gambar'] ?>" width="80" alt="Gambar">
                    </td>
                    <td><?= $row['nama_produk'] ?></td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        
                        <a href="admin.php?hapus=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
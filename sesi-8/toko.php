<?php
// Buat koneksi PHP ke database MySQL
$host = "localhost";
$user = "root";
$pass = "password"; // <--- UBAH DENGAN PASSWORD MYSQL ANDA
$db   = "toko";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}


// Fitur Filter Berdasarkan Kategori

// Mengecek apakah ada parameter '?kategori=' di URL (Method GET)
$kategori_aktif = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// Menyusun Query berdasarkan apakah filter sedang aktif atau tidak
if ($kategori_aktif != '') {
    // Jika tombol filter diklik, tampilkan yang kategorinya cocok
    $sql = "SELECT * FROM products WHERE kategori = '$kategori_aktif'";
} else {
    // Jika tidak difilter (Tampil Semua)
    $sql = "SELECT * FROM products";
}

$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Toko Fayyad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Katalog Produk</h2>

    <div class="text-center mb-4">
        <a href="toko.php" class="btn <?= ($kategori_aktif == '') ? 'btn-primary' : 'btn-outline-primary' ?>">Semua</a>
        <a href="toko.php?kategori=Pakaian" class="btn <?= ($kategori_aktif == 'Pakaian') ? 'btn-primary' : 'btn-outline-primary' ?>">Pakaian</a>
        <a href="toko.php?kategori=Aksesoris" class="btn <?= ($kategori_aktif == 'Aksesoris') ? 'btn-primary' : 'btn-outline-primary' ?>">Aksesoris</a>
        <a href="toko.php?kategori=Elektronik" class="btn <?= ($kategori_aktif == 'Elektronik') ? 'btn-primary' : 'btn-outline-primary' ?>">Elektronik</a>
    </div>

    <div class="row g-4">
        <?php 
        // Ambil data dan tampilkan menggunakan Looping PHP

        // Mengecek apakah ada produk yang ditemukan
        if (mysqli_num_rows($result) > 0) {
            
            // Looping mengeluarkan data baris demi baris
            while ($row = mysqli_fetch_assoc($result)) { 
        ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <span class="badge bg-secondary mb-2"><?= $row['kategori'] ?></span>
                            <h5 class="card-title"><?= $row['nama_produk'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-success">Rp <?= number_format($row['harga'], 0, ',', '.') ?></h6>
                            <p class="card-text text-muted small"><?= $row['deskripsi'] ?></p>
                            <p class="card-text"><small>Stok: <?= $row['stok'] ?></small></p>
                        </div>
                    </div>
                </div>
        <?php 
            } // Akhir dari kurung kurawal while
        } else {
            echo "<div class='col-12 text-center'><p>Tidak ada produk di kategori ini.</p></div>";
        }
        ?>
    </div>
</div>

<?php 
// Selalu biasakan menutup koneksi di akhir file
mysqli_close($koneksi); 
?>
</body>
</html>
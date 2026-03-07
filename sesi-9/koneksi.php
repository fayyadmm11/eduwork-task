<?php
$host = "localhost";
$user = "root";
$pass = "password_anda"; // Sesuaikan dengan password database Anda
$db   = "toko";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
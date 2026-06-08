<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel E-Commerce Basic Flow

Proyek ini adalah implementasi sistem E-Commerce dasar menggunakan arsitektur MVC pada Laravel. Proyek ini mendemonstrasikan alur belanja secara _end-to-end_, mulai dari melihat katalog produk, memasukkan barang ke keranjang belanja (menggunakan _Session_), hingga memproses _Checkout_ yang akan memanipulasi data di _database_ relasional MySQL.

## 🚀 Fitur Utama

- **Katalog Produk (Read):** Menampilkan data produk langsung dari _database_ memanfaatkan fitur _Route Model Binding_.
- **Sistem Keranjang (Cart):** Menyimpan pesanan sementara menggunakan _Session_ berbasis file sebelum di-_checkout_.
- **Checkout & Inventory Control:** Memasukkan data transaksi ke tabel `orders` sekaligus memotong jumlah `stok` di tabel `products` secara _real-time_.
- **Keamanan (Rate Limiting):** Dilengkapi dengan sistem proteksi _Rate Limiting_ (`throttle`) untuk mencegah _spam request_ pada _endpoint_ utama.

## 💻 Prasyarat Sistem

Sebelum mengunduh dan menjalankan proyek ini, pastikan sistem Anda sudah terinstal:

- PHP (minimal versi 8.x) dengan ekstensi `zip`, `fileinfo`, `mbstring`, `openssl`, `curl`, `pdo_mysql` aktif.
- Composer
- MySQL Server

## 🛠️ Cara Instalasi dan Menjalankan Proyek

**1. Clone Repository**
Jalankan perintah berikut di terminal Anda untuk mengunduh kode sumber:

```bash
git clone [https://github.com/username-anda/nama-repo-anda.git](https://github.com/username-anda/nama-repo-anda.git)
cd nama-repo-anda
```

**2. Instalasi Dependensi (Vendor)**
Instal semua pustaka PHP dan bawaan Laravel yang dibutuhkan:

```bash
composer install
```

**3. Konfigurasi Environment**
Gandakan file .env.example menjadi file .env yang baru:
cp .env.example .env
Buka file .env tersebut dan atur koneksi database Anda. Pastikan juga Session dan Cache diatur ke file:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=toko
DB_USERNAME=root
DB_PASSWORD=password_mysql_anda

SESSION_DRIVER=file
CACHE_STORE=file
```

**4. Generate Application Key**
Buat kunci keamanan unik untuk aplikasi Laravel Anda:

```bash
php artisan key:generate
```

**5. Import Database Setup**
Proyek ini menggunakan rancangan database manual (tanpa Laravel Migration). Anda wajib mengimpor struktur tabelnya terlebih dahulu:

1. Buat database baru di MySQL Anda dengan nama toko.

    > **Catatan:** File `database_toko.sql` ini sudah berisi data sampel (dummy) untuk keperluan uji coba. Jika Anda ingin menjalankan aplikasi dengan database yang benar-benar bersih, silakan buka file `.sql` tersebut menggunakan _text editor_, lalu hapus semua blok kode yang berawalan `INSERT INTO` sebelum melakukan proses impor.

2. Import file database_toko.sql (yang sudah disertakan di dalam repository ini) ke dalam database tersebut. Anda bisa menggunakan terminal MySQL atau tools seperti phpMyAdmin:

```bash
mysql -u root -p toko < database_toko.sql
```

3. Pastikan tabel users, products, dan orders beserta isinya sudah berhasil masuk.

**6. Jalankan Server Lokal**
Nyalakan development server bawaan Laravel:

```bash
php artisan serve
```

Buka browser Anda dan akses URL berikut untuk mulai menjelajahi katalog aplikasi:
👉 http://127.0.0.1:8000/products

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

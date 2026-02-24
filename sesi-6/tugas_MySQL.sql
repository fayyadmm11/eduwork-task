
-- 1. Membuat dan menggunakan database MySQL
CREATE DATABASE IF NOT EXISTS toko;
USE toko;

-- A. Tabel users (Dibuat lebih dulu karena akan di-referensi oleh orders)
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255)
);

-- B. Tabel products
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_produk VARCHAR(150),
    harga INT,
    deskripsi TEXT,
    stok INT
);

-- C. Tabel orders (Menggunakan Foreign Key ke users dan products)
CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    product_id INT,
    quantity INT,
    total INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

SELECT * FROM products; -- Masih kosong, belum ada data

-- a. CREATE (Menambah data produk)
INSERT INTO products (nama_produk, harga, deskripsi, stok) VALUES 
('Kemeja Flanel', 120000, 'Kemeja pria motif kotak-kotak lengan panjang', 25),
('Sepatu Sneakers', 250000, 'Sepatu kasual warna putih ukuran 42', 15),
('Topi Baseball', 50000, 'Topi warna hitam polos', 40);

-- b. READ (Membaca/menampilkan data produk)
-- Menampilkan seluruh data produk yang baru dimasukkan
SELECT * FROM products; -- Setelah CREATE

-- c. UPDATE (Mengubah data produk)
-- Mengubah harga Kemeja Flanel (id = 1) menjadi diskon
UPDATE products 
SET harga = 100000 
WHERE id = 1;

SELECT * FROM products; -- Setelah UPDATE

-- d. DELETE (Menghapus data produk)
-- Menghapus produk Sepatu Sneakers (id = 2)
DELETE FROM products 
WHERE id = 2;

-- Menampilkan hasil akhir setelah Update dan Delete
SELECT * FROM products; -- Setelah DELETE

-- 1. Reset dan Buat Database Baru
DROP DATABASE IF EXISTS toko;
CREATE DATABASE toko;
USE toko;

-- MEMBUAT TABEL

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255)
);

-- Penambahan kolom 'kategori' langsung di struktur tabel products
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_produk VARCHAR(150),
    harga INT,
    deskripsi TEXT,
    stok INT,
    kategori VARCHAR(50) 
);

CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    product_id INT,
    quantity INT,
    total INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);


-- CRUD TABEL PRODUCTS

-- a. CREATE (Menambah data produk beserta kategorinya)
INSERT INTO products (nama_produk, harga, deskripsi, stok, kategori) VALUES 
('Kemeja Flanel', 120000, 'Kemeja pria motif kotak-kotak lengan panjang', 25, 'Pakaian'),
('Sepatu Sneakers', 250000, 'Sepatu kasual warna putih ukuran 42', 15, 'Pakaian'),
('Topi Baseball', 50000, 'Topi warna hitam polos', 40, 'Aksesoris'),
('Mouse Wireless', 150000, 'Mouse komputer tanpa kabel', 10, 'Elektronik');

-- b. READ
SELECT * FROM products;

-- c. UPDATE
UPDATE products 
SET harga = 100000 
WHERE id = 1;

-- d. DELETE
DELETE FROM products 
WHERE id = 2;

-- Menampilkan hasil akhir
SELECT * FROM products;
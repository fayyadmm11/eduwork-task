DROP DATABASE IF EXISTS toko;
CREATE DATABASE toko;
USE toko;

-- Tabel Users
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255)
);

-- Tabel Products (Sekarang sudah ada kolom GAMBAR)
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_produk VARCHAR(150),
    harga INT,
    deskripsi TEXT,
    stok INT,
    kategori VARCHAR(50),
    gambar VARCHAR(255) 
);

-- Tabel Orders
CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    product_id INT,
    quantity INT,
    total INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Memasukkan beberapa data dummy awal (gambar dibiarkan NULL dulu)
INSERT INTO products (nama_produk, harga, deskripsi, stok, kategori) VALUES 
('Kemeja Flanel', 120000, 'Kemeja motif kotak', 25, 'Pakaian'),
('Mouse Wireless', 150000, 'Mouse tanpa kabel', 10, 'Elektronik');
<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop Asus VivoBook',
                'description' => 'Laptop ringan bertenaga Intel Core i5, RAM 8GB, SSD 512GB.',
                'stock' => 15,
                'image' => 'laptop-asus.jpg',
            ],
            [
                'name' => 'Smartphone Samsung Galaxy A54',
                'description' => 'Layar Super AMOLED 6.4 inci, kamera 50MP, baterai 5000mAh.',
                'stock' => 30,
                'image' => 'samsung-a54.jpg',
            ],
            [
                'name' => 'Kaos Polos Cotton Combed',
                'description' => 'Bahan cotton combed 30s, nyaman dipakai sehari-hari.',
                'stock' => 100,
                'image' => 'kaos-polos.jpg',
            ],
            [
                'name' => 'Sepatu Running Nike Air',
                'description' => 'Ringan dan responsif, cocok untuk lari jarak jauh.',
                'stock' => 25,
                'image' => 'nike-air.jpg',
            ],
            [
                'name' => 'Buku Clean Code',
                'description' => 'Panduan menulis kode yang bersih dan mudah dipelihara oleh Robert C. Martin.',
                'stock' => 20,
                'image' => 'clean-code.jpg',
            ],
            [
                'name' => 'Headphone Sony WH-1000XM5',
                'description' => 'Noise cancelling terbaik, baterai 30 jam, suara jernih.',
                'stock' => 10,
                'image' => 'sony-wh1000xm5.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

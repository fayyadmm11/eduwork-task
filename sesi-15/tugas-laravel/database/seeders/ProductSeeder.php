<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // category_id: 1=Elektronik, 2=Pakaian, 3=Makanan & Minuman, 4=Olahraga, 5=Buku
        $products = [
            [
                'category_id' => 1,
                'name'        => 'Laptop Asus VivoBook',
                'price'       => 8500000,
                'description' => 'Laptop ringan bertenaga Intel Core i5, RAM 8GB, SSD 512GB.',
                'stock'       => 15,
                'image'       => 'laptop-asus.jpg',
            ],
            [
                'category_id' => 1,
                'name'        => 'Smartphone Samsung Galaxy A54',
                'price'       => 4200000,
                'description' => 'Layar Super AMOLED 6.4 inci, kamera 50MP, baterai 5000mAh.',
                'stock'       => 30,
                'image'       => 'samsung-a54.jpg',
            ],
            [
                'category_id' => 1,
                'name'        => 'Headphone Sony WH-1000XM5',
                'price'       => 3800000,
                'description' => 'Noise cancelling terbaik, baterai 30 jam, suara jernih.',
                'stock'       => 10,
                'image'       => 'sony-wh1000xm5.jpg',
            ],
            [
                'category_id' => 2,
                'name'        => 'Kaos Polos Cotton Combed',
                'price'       => 85000,
                'description' => 'Bahan cotton combed 30s, nyaman dipakai sehari-hari.',
                'stock'       => 100,
                'image'       => 'kaos-polos.jpg',
            ],
            [
                'category_id' => 4,
                'name'        => 'Sepatu Running Nike Air',
                'price'       => 1250000,
                'description' => 'Ringan dan responsif, cocok untuk lari jarak jauh.',
                'stock'       => 25,
                'image'       => 'nike-air.jpg',
            ],
            [
                'category_id' => 5,
                'name'        => 'Buku Clean Code',
                'price'       => 195000,
                'description' => 'Panduan menulis kode yang bersih dan mudah dipelihara oleh Robert C. Martin.',
                'stock'       => 20,
                'image'       => 'clean-code.jpg',
            ],
            [
                'category_id' => 5,
                'name'        => 'Buku Laravel Up & Running',
                'price'       => 320000,
                'description' => 'Panduan lengkap membangun aplikasi web modern dengan Laravel.',
                'stock'       => 18,
                'image'       => 'laravel-book.jpg',
            ],
            [
                'category_id' => 3,
                'name'        => 'Kopi Arabica Gayo 250gr',
                'price'       => 75000,
                'description' => 'Kopi single origin dari dataran tinggi Gayo, Aceh. Rasa fruity dan floral.',
                'stock'       => 50,
                'image'       => 'kopi-gayo.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

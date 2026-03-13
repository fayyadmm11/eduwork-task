<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Beri tahu Laravel bahwa Primary Key kita bernama 'order_id', bukan 'id'
    protected $primaryKey = 'order_id';

    // Matikan fitur pencatat waktu otomatis karena tabel kita belum punya kolomnya
    public $timestamps = false;

    // Izinkan kolom-kolom ini diisi data
    protected $fillable = ['user_id', 'product_id', 'quantity', 'total'];
}
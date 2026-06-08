<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'stock', 'image'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'orders')->withPivot('quantity', 'total');
    }
}

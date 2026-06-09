<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts   = Product::count();
        $totalCategories = Category::count();
        $totalClicks     = Product::sum('views');

        return view('dashboard', compact('totalProducts', 'totalCategories', 'totalClicks'));
    }
}

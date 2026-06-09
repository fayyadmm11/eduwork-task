<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman Home (Beranda)
    public function home()
    {
        return view('pages.home');
    }

    // Menampilkan halaman About (Tentang Kami)
    public function about()
    {
        return view('pages.about');
    }
}
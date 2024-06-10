<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Daftar_BeritaController extends Controller
{
    public function tampilkan()
    {
        return view('daftar_berita');
    }
}


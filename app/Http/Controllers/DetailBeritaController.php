<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailBeritaController extends Controller
{
    public function tampilkan()
    {
        return view('detail_berita');
    }
}


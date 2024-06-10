<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriPelatihanController extends Controller
{
    public function tampilkan()
    {
        return view('materi_pelatihan');
    }
}


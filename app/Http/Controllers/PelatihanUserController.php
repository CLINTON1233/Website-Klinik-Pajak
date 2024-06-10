<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelatihanUserController extends Controller
{
    public function tampilkan()
    {
        return view('pelatihan');
    }
}


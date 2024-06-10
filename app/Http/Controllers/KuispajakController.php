<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KuispajakController extends Controller
{
    public function tampilkan()
    {
        return view('kuispajak');
    }
}


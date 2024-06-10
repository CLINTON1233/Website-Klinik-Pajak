<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FashionControler extends Controller
{
    public function tampilkan()
    {
        return view('fashion');
    }
}


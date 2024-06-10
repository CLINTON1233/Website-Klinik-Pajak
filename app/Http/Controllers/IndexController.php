<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function tampilkan()
    {
        return view('index_user');
    }
}


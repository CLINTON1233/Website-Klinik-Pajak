<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewpdfController extends Controller
{
    public function tampilkan()
    {
        return view('viewpdf');
    }
}


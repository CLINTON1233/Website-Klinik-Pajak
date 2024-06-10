<?php

namespace App\Http\Controllers;

use App\Models\Konsultan;
use Illuminate\Http\Request;

class KonsultanUserController extends Controller
{
    public function tampilkan()
    {
        $konsultan = Konsultan::all();
        return view('konsultan', ['konsultan' => $konsultan]);
    }
}

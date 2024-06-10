<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function index()
    {

        $id = session('id_user');
        $admin = Admin::find($id);

        return view('user.demo1.index', compact('admin')); 
    }
}

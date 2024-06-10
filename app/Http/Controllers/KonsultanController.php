<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbKonsultan;

class KonsultanController extends Controller
{
    public function index()
    {
        $konsultans = TbKonsultan::all(); 
        return view('user.demo1.list_konsultan', ['konsultans' => $konsultans]);
    }

    public function create()
    {
        return view('user.demo1.create_konsultan');
    }

    public function detail($id)
    {
        $konsultan = TbKonsultan::findOrFail($id);
        return view('user.demo1.detail_konsultan', ['konsultan' => $konsultan]);
    }

    public function delete($id)
    {
        $konsultan = TbKonsultan::findOrFail($id);
        $konsultan->delete();
        return response()->json(['status' => 'success', 'message' => 'Konsultan berhasil dihapus.']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'bio' => 'required',
            'profil_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alumnus' => 'required',
            'bidang' => 'required',
            'pengalaman' => 'required',
            'jenjang_karir' => 'required',
        ]);

        $konsultan = new TbKonsultan();
        $konsultan->nama = $request->nama;
        $konsultan->email = $request->email;
        $konsultan->password = bcrypt($request->password);
        $konsultan->bio = $request->bio;
        
        // Handle Profil Pic Upload
        $profilPicName = time().'.'.$request->profil_pic->extension();  
        $request->profil_pic->move(public_path('img/konsultan_profil'), $profilPicName);
        $konsultan->profil_pic = $profilPicName;

        $konsultan->alumnus = $request->alumnus;
        $konsultan->bidang = $request->bidang;
        $konsultan->status = 'Online';
        $konsultan->pengalaman = $request->pengalaman;
        $konsultan->jenjang_karir = $request->jenjang_karir;
        
        $konsultan->save();

        return redirect()->route('list_konsultan')->with('success', 'Konsultan berhasil ditambahkan.');
    }
}

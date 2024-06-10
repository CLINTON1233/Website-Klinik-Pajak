<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KategoriUsaha;
class UsahaController extends Controller
{
    public function index()
    {
        $kategoriUsaha = DB::table('kategori_usaha')->get();

        return view('user.demo1.list_usaha', compact('kategoriUsaha'));
    }

    public function delete($id)
    {
        DB::table('kategori_usaha')->where('id', $id)->delete();

        return redirect()->route('list_usaha')->with('success', 'Usaha berhasil dihapus');
    }

    public function edit($id)
    {
        $materi = DB::table('kategori_usaha')->find($id);

        if (!$materi) {
            return redirect()->route('list_usaha')->with('error', 'Usaha tidak ditemukan');
        }

        return view('user.demo1.edit_usaha', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file_pdf' => 'nullable|file|mimes:pdf|max:2048', 
        ]);

        $usaha = DB::table('kategori_usaha')->find($id);

        if (!$usaha) {
            return redirect()->route('list_usaha')->with('error', 'Usaha tidak ditemukan');
        }

        $updateData = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('file_pdf')) {
            $filePdf = $request->file('file_pdf');

            $filePdfPath = $filePdf->storeAs('tables/PDF', $filePdf->getClientOriginalName());

            $updateData['file_pdf'] = $filePdfPath;
        }

        DB::table('kategori_usaha')->where('id', $id)->update($updateData);

        return redirect()->route('list_usaha')->with('success', 'Data usaha berhasil diupdate');
    }
    public function create()
    {
        return view('user.demo1.create_usaha');
    }

    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file_pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);
    
        $kategoriUsaha = new KategoriUsaha();
        $kategoriUsaha->judul = $request->judul;
        $kategoriUsaha->deskripsi = $request->deskripsi;

        if ($request->hasFile('file_pdf')) {
            $filePdf = $request->file('file_pdf');
            $filePdfPath = $filePdf->store('tables/PDF');
            $kategoriUsaha->file_pdf = $filePdfPath;
        }
    
        $kategoriUsaha->save();
    
        return redirect()->route('list_usaha')->with('success', 'Usaha berhasil ditambahkan');
    }

}


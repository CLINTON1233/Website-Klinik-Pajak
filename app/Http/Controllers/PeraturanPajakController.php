<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PeraturanPajak;

class PeraturanPajakController extends Controller
{
    public function index()
    {
        $peraturanPajak = PeraturanPajak::all();

        return view('user.demo1.list_pajak', ['peraturanPajak' => $peraturanPajak]);
    }

    public function create()
    {
        return view('user.demo1.create_pajak');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'file_pdf' => 'required|file|mimes:pdf|max:2048', // PDF file with max size 2MB
        ]);

        $file = $request->file('file_pdf');
        $namaFile = $file->getClientOriginalName();
        $path = $file->storeAs('tables/PDF', $namaFile);

        $peraturanPajak = new PeraturanPajak();
        $peraturanPajak->judul = $request->judul;
        $peraturanPajak->deskripsi = $request->deskripsi;
        $peraturanPajak->kategori = $request->kategori;
        $peraturanPajak->file_pdf = $namaFile;
        $peraturanPajak->save();

        return redirect()->route('list_pajak')->with('success', 'Data berhasil ditambahkan!');
    }
        
    public function edit($id)
    {
        $pajak = PeraturanPajak::find($id);
        return view('user.demo1.edit_pajak', compact('pajak'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'file_pdf' => 'sometimes|file|mimes:pdf|max:2048', 
        ]);

        $peraturanPajak = PeraturanPajak::findOrFail($id);

        $peraturanPajak->judul = $request->judul;
        $peraturanPajak->deskripsi = $request->deskripsi;
        $peraturanPajak->kategori = $request->kategori;

        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            $namaFile = $file->getClientOriginalName();
            $path = $file->storeAs('tables/PDF', $namaFile);
            $peraturanPajak->file_pdf = $namaFile;
        }

        $peraturanPajak->save();

        return redirect()->route('list_pajak')->with('success', 'Peraturan pajak berhasil diperbarui');
    }
    
    public function delete($id)
    {
        $peraturanPajak = PeraturanPajak::findOrFail($id);

        $peraturanPajak->delete();

        return redirect()->route('list_pajak')->with('success', 'Peraturan pajak berhasil dihapus');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;

class PelatihanController extends Controller
{
    public function listPelatihan()
    {
        $pelatihanList = Pelatihan::all();
        return view('user.demo1.list_pelatihan', ['pelatihanList' => $pelatihanList]);
    }

    public function create()
    {
        return view('user.demo1.create_pelatihan'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'cover' => 'required|image',
            'file_pdf' => 'required|mimes:pdf',
            'file_ppt' => 'required|mimes:ppt,pptx',
            'ytb' => 'required',
        ]);

        $cover = $request->file('cover');
        $namaCover = time() . '_' . $cover->getClientOriginalName();
        $lokasiSimpanCover = 'tables/cover_berita/';
        $cover->move($lokasiSimpanCover, $namaCover);

        $pdf = $request->file('file_pdf');
        $namaPdf = time() . '_' . $pdf->getClientOriginalName();
        $lokasiSimpanPdf = 'tables/PDF/';
        $pdf->move($lokasiSimpanPdf, $namaPdf);

        $ppt = $request->file('file_ppt');
        $namaPpt = time() . '_' . $ppt->getClientOriginalName();
        $lokasiSimpanPpt = 'tables/PPT/';
        $ppt->move($lokasiSimpanPpt, $namaPpt);

        $pelatihan = new Pelatihan();
        $pelatihan->judul = $request->judul;
        $pelatihan->isi = $request->isi;
        $pelatihan->cover = $namaCover;
        $pelatihan->file_pdf = $namaPdf;
        $pelatihan->file_ppt = $namaPpt;
        $pelatihan->ytb = $request->ytb;
        $pelatihan->save();

        return redirect()->route('list_pelatihan')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $materi = Pelatihan::find($id);
        if (!$materi) {
            return "Data tidak ditemukan.";
        }
        return view('user.demo1.edit_pelatihan', ['materi' => $materi]);
    }

    public function update(Request $request)
    {
        $materi = Pelatihan::find($request->id);
        if (!$materi) {
            return "Data tidak ditemukan.";
        }

        $materi->judul = $request->judul;
        $materi->isi = $request->isi;
        $materi->ytb = $request->ytb;

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $namaCover = time() . '_' . $cover->getClientOriginalName();
            $lokasiSimpan = 'tables/cover_berita/';
            $cover->move($lokasiSimpan, $namaCover);
            $materi->cover = $namaCover;
        }

        if ($request->hasFile('file_pdf')) {
            $pdf = $request->file('file_pdf');
            $namaPdf = time() . '_' . $pdf->getClientOriginalName();
            $lokasiSimpanPdf = 'tables/PDF/';
            $pdf->move($lokasiSimpanPdf, $namaPdf);
            $materi->file_pdf = $namaPdf;
        }

        if ($request->hasFile('file_ppt')) {
            $ppt = $request->file('file_ppt');
            $namaPpt = time() . '_' . $ppt->getClientOriginalName();
            $lokasiSimpanPpt = 'tables/PPT/';
            $ppt->move($lokasiSimpanPpt, $namaPpt);
            $materi->file_ppt = $namaPpt;
        }

        if ($materi->save()) {
            return redirect()->route('list_pelatihan')->with('success', 'Data berhasil diupdate!');
        } else {
            return "Gagal mengupdate data.";
        }
    }

    public function deletePelatihan($id)
    {
        $pelatihan = Pelatihan::find($id);
        if ($pelatihan) {
            $pelatihan->delete();
            return response()->json(['status' => 'success', 'message' => 'Pelatihan berhasil dihapus']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Pelatihan tidak ditemukan'], 404);
        }
    }

}
?>

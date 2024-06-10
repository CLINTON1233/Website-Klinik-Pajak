<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizPajak;
use App\Models\SoalPajak;

class QuizController extends Controller
{
//KUIS
    public function listKuis()
    {
        $kuisList = QuizPajak::all();
        return view('user.demo1.list_kuis', ['kuisList' => $kuisList]);
    }

    public function createKuis()
    {
        return view('user.demo1.create_kuis');
    }

    public function simpan(Request $request)
    {
        $kuis = new QuizPajak;
        $kuis->no_kuis = $request->input('no_kuis');
        $kuis->judul_kuis = $request->input('judul_kuis');
        $kuis->waktu = $request->input('waktu');
        $kuis->jumlah_soal = $request->input('jumlah_soal');
        $kuis->save();
        return redirect()->route('list_kuis')->with('success', 'Data berhasil disimpan');
    }

    public function delete($id)
    {
        $kuis = QuizPajak::find($id);
        if ($kuis) {
            $kuis->delete();
            return redirect()->route('list_kuis')->with('success', 'Kuis berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Kuis tidak ditemukan.');
        }
    }
    
    public function editKuis($id)
    {
        $kuis = QuizPajak::findOrFail($id);

        return view('user.demo1.edit_kuis', compact('kuis'));
    }

    public function updateKuis(Request $request, $id)
    {
        $kuis = QuizPajak::findOrFail($id);
        $kuis->judul_kuis = $request->judul;
        $kuis->waktu = $request->waktu;
        $kuis->save();

        return redirect()->route('list_kuis')->with('success', 'Kuis berhasil diperbarui.');
    }



//SOAL KUIS
    public function listSoal($id)
    {
        $soal = QuizPajak::findOrFail($id);
        $soalList = SoalPajak::where('id_kuis', $id)->get();
        return view('user.demo1.list_soal', ['soal' => $soal, 'soalList' => $soalList, 'kuis' => $soal]);
    }

    public function createSoal($id)
    {
        $soal = QuizPajak::findOrFail($id);
        return view('user.demo1.create_soal', ['soal' => $soal]);
    }

    public function storeSoal(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'skor' => 'required|numeric',
            'tipe_soal' => 'required',
        ]);

        $soal = new SoalPajak;
        $soal->id_kuis = $id;
        $soal->soal = $request->input('pertanyaan');
        $soal->skor = $request->input('skor');
        $soal->tipe_soal = $request->input('tipe_soal');
        $soal->pilihan_a = $request->input('pilihan_a');
        $soal->pilihan_b = $request->input('pilihan_b');
        $soal->pilihan_c = $request->input('pilihan_c');
        $soal->pilihan_d = $request->input('pilihan_d');
        $soal->pilihan_e = $request->input('pilihan_e');
        $soal->jawaban = $request->input('jawaban');
        $soal->save();

        return redirect()->route('list_soal', ['id' => $id])->with('success', 'Soal berhasil disimpan');
    }
    public function editSoal($id)
    {
        $soal = SoalPajak::findOrFail($id);
        return view('user.demo1.edit_soal', ['soal' => $soal]);
    }

    public function updateSoal(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'skor' => 'required|numeric',
            'tipe_soal' => 'required',
        ]);

        $soal = SoalPajak::findOrFail($id);
        $soal->soal = $request->input('pertanyaan');
        $soal->skor = $request->input('skor');
        $soal->tipe_soal = $request->input('tipe_soal');
        $soal->pilihan_a = $request->input('pilihan_a');
        $soal->pilihan_b = $request->input('pilihan_b');
        $soal->pilihan_c = $request->input('pilihan_c');
        $soal->pilihan_d = $request->input('pilihan_d');
        $soal->pilihan_e = $request->input('pilihan_e');
        $soal->jawaban = $request->input('jawaban');
        $soal->save();

        return redirect()->route('list_soal', ['id' => $soal->id_kuis])->with('success', 'Soal berhasil diperbarui.');
    }

    public function deleteSoal($id)
    {
        $soal = SoalPajak::find($id);
        if ($soal) {
            $id_kuis = $soal->id_kuis;
            $soal->delete();
            return redirect()->route('list_soal', ['id' => $id_kuis])->with('success', 'Soal berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Soal tidak ditemukan.');
        }
    }



//RIWAYAT KUIS  
    public function riwayatKuis()
    {
        $riwayatKuis = QuizPajak::all(); 
        return view('user.demo1.riwayat_kuis', ['riwayatKuis' => $riwayatKuis]);
    }
    public function evaluasiKuis($id)
    {
        $kuis = QuizPajak::findOrFail($id);
        return view('user.demo1.evaluasi_kuis', ['kuis' => $kuis]);
    }

}

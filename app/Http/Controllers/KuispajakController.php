<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalPajak;
use App\Models\RiwayatPengerjaan;

class KuispajakController extends Controller
{
    public function tampilkanKuisUtama()
    {
        return view('KuisUtama');
    }

    public function tampilkanKuisPajak()
    {
        return view('kuispajak');
    }

    public function tampilkanQuizPajak1()
    {
        $soalList = SoalPajak::all();
        $soal = $soalList->first(); // Ambil soal pertama atau atur logika sesuai kebutuhan
        return view('quiz_pajak1', ['soalList' => $soalList, 'soal' => $soal, 'currentIndex' => 0]);
    }

    public function handleQuizPage(Request $request)
    {
        // Validasi form dan simpan nama dan email ke session
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
        ]);

        $nama = $request->input('nama');
        $email = $request->input('email');

        // Simpan nama dan email ke session
        $request->session()->put('nama', $nama);
        $request->session()->put('email', $email);

        // Redirect ke halaman pertama kuis setelah submit form
        return redirect()->route('quiz1_pajak');
    }

    public function showNextQuiz(Request $request, $currentIndex)
    {
        $soalList = SoalPajak::all();
        $nextIndex = $currentIndex + 1;

        // Jika sudah melewati indeks terakhir, kembali ke indeks pertama
        if ($nextIndex >= $soalList->count()) {
            $nextIndex = 0;
        }

        $soal = $soalList[$nextIndex];

        return view('quiz_pajak1', [
            'soalList' => $soalList,
            'soal' => $soal,
            'currentIndex' => $nextIndex,
        ]);
    }

    public function saveAnswer(Request $request, $currentIndex)
    {
        $soalList = SoalPajak::all();
        $soal = $soalList[$currentIndex];

        // Simpan jawaban ke database atau session
        $soal->jawaban = $request->input('answer');
        $soal->save();

        return redirect()->route('next_quiz', ['currentIndex' => $currentIndex]);
    }

    public function konfirmasiKuis()
    {
        $soalList = SoalPajak::all();
        return view('konfirmasikuis', ['soalList' => $soalList]);
    }

    public function sendAnswers(Request $request)
    {
        // Validasi form sebelum menyimpan
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
        ]);

        // Ambil data dari form
        $nama = $request->input('nama');
        $email = $request->input('email');

        // Hitung skor akhir dari jawaban yang tersimpan di database
        $soalList = SoalPajak::all();
        $skor_akhir = 0;
        foreach ($soalList as $soal) {
            if ($soal->jawaban) {
                $skor_akhir++;
            }
        }

        // Simpan ke database
        $riwayat = new RiwayatPengerjaan();
        $riwayat->nama = $nama;
        $riwayat->email = $email;
        $riwayat->skor_akhir = $skor_akhir;
        $riwayat->tanggal = now()->format('Y-m-d H:i:s'); // Format tanggal sesuai dengan MySQL
        $riwayat->save();

        // Set session riwayat untuk ditampilkan di halaman hasil kuis
        $request->session()->put('riwayat', $riwayat);

        return redirect()->route('hasil_kuis');
    }

    public function hasilKuis()
    {
        return view('hasilkuis');
    }
    public function evaluasiKuis()
    {

        $riwayat = session('riwayat');
        return view('evaluasi_kuis', ['riwayat' => $riwayat]);
    }
}

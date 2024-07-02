<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluasi Kuis | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/evaluasikuis.css') }}">
</head>

<body>
    @include('layout.navbar4')

    <div class="main-panel mr-5">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <div class="d-flex align-items-center mb-3">
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <svg class="me-3" id="kuis" height="40" viewBox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                                <defs>
                                    <linearGradient id="gradient" x1="0" y1="0" x2="1" y2="1" gradientTransform="rotate(41)">
                                        <stop offset="0%" stop-color="#09c778"></stop>
                                        <stop offset="100%" stop-color="#01a0f9"></stop>
                                    </linearGradient>
                                </defs>
                                <path fill="url(#gradient)" d="m20.389 4.268-2.657-2.657a5.462 5.462 0 0 0 -3.889-1.611h-6.343a5.506 5.506 0 0 0 -5.5 5.5v13a5.506 5.506 0 0 0 5.5 5.5h9a5.506 5.506 0 0 0 5.5-5.5v-10.343a5.464 5.464 0 0 0 -1.611-3.889zm-3.889 16.732h-9a2.5 2.5 0 0 1 -2.5-2.5v-13a2.5 2.5 0 0 1 2.5-2.5h5.5v4a2 2 0 0 0 2 2h4v9.5a2.5 2.5 0 0 1 -2.5 2.5zm.586-9.534a1.5 1.5 0 0 1 -.052 2.12l-3.586 3.414a3.5 3.5 0 0 1 -4.923-.025l-1.525-1.355a1.5 1.5 0 1 1 2-2.24l1.586 1.414a.584.584 0 0 0 .414.206.5.5 0 0 0 .353-.146l3.613-3.44a1.5 1.5 0 0 1 2.12.052z" />
                            </svg><br>
                            <h3><b> Kuis Perpajakan PPh 21</b></h3>
                        </div>

                        <div class="row-container">
                            <div class="question-card">
                                <div class="card card-border">
                                    <div class="card-body">
                                        <table class="table table-bordered table-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-bold bg-light">Mulai</td>
                                                    <td>Rabu, 24 April 2024 07:00</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bold bg-light">Status</td>
                                                    <td>Selesai</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bold bg-light">Selesai</td>
                                                    <td>Rabu, 2 Juli 2024 08:20</td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <!-- Start Soal 1-->
                                        <div class="row g-5">
                                            <div class="col-lg-3 mt-3">
                                                <div class="card card-border" id="soal-1">
                                                    <div class="card-body">
                                                        <p class="fw-bold">Pertanyaan 1</p>
                                                        <p class="text-primary">Benar</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 mt-3">
                                                <div class="card card-border bg-light">
                                                    <div class="card-body">
                                                        <p>Ahmad Zakaria pada tahun 2015 bekerja pada perusahaan PT
                                                            Zamrud Abadi dengan memperoleh gaji sebulan Rp 6.000.000,00
                                                            dan membayar iuran pensiun sebesar Rp 100.000,00. Ahmad
                                                            menikah tetapi belum mempunyai anak. Bagaimana perhitungan
                                                            PPh pasal 21?</p>
                                                        <form>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                                <label class="form-check-label" for="flexRadioDefault1" style="font-weight: normal; color: black;">
                                                                    Rp 200.000,00
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                                <label class="form-check-label" for="flexRadioDefault2" style="font-weight: normal; color: black;">
                                                                    Rp 177.000,00
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                                                <label class="form-check-label" for="flexRadioDefault3" style="font-weight: normal; color: black;">
                                                                    Rp 217.000,00
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                                                <label class="form-check-label" for="flexRadioDefault4" style="font-weight: normal; color: black;">
                                                                    Rp 177.100,00
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5" checked>
                                                                <label class="form-check-label" for="flexRadioDefault5" style="font-weight: normal; color: black;">
                                                                    Rp 177.500,00
                                                                </label>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="custom-card mt-3 text-white mb-4">
                                                    <div class="card-body">
                                                        <p>Jawaban anda benar</p>
                                                        <p>Jawaban Benar : Rp 117.500,00</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Soal 1-->

                                            <!-- Start Soal 2-->
                                            <!--<div class="col-lg-3 mt-3">
                                                <div class="card card-border" id="soal-2">
                                                    <div class="card-body">
                                                        <p class="fw-bold">Pertanyaan 2</p>
                                                        <p>-</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 mt-3">
                                                <div class="card card-border bg-light">
                                                    <div class="card-body">
                                                        <p>Pada tahun 2021, Pak Budi adalah karyawan yang belum menikah.
                                                            Maka PTKP untuk Pak Budi adalah...</p>
                                                        <form>
                                                            <div class="mb-3">
                                                                <label for="jawaban2" class="form-label">Jawaban
                                                                    :</label>
                                                                <textarea class="form-control card-border" id="jawaban2" rows="3">TK/0 = Rp 54.000.000</textarea>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            
                                            <div class="col-lg-3 mt-3">
                                                <div class="card card-border" id="soal-3">
                                                    <div class="card-body">
                                                        <p class="fw-bold">Pertanyaan 3</p>
                                                        <p class="text-danger">Salah</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 mt-3">
                                                <div class="card card-border bg-light">
                                                    <div class="card-body">
                                                        <p>Bagi penerima penghasilan yang tidak memiliki NPWP, dikenakan
                                                            pemotongan PPh Pasal 21 dengan tarif lebih tinggi 20%
                                                            daripada tarif yang diterapkan terhadap wajib pajak yang
                                                            memiliki NPWP</p>
                                                        <form>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="radio-3" id="radio3-1">
                                                                <label class="form-check-label" for="radio3-1" style="font-weight: normal; color: black;">Benar</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="radio-3" id="radio3-2" checked>
                                                                <label class="form-check-label" for="radio3-2" style="font-weight: normal; color: black;">Salah</label>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="custom-card text-white mt-3 mb-3">
                                                    <div class="card-body">
                                                        <p>Jawaban anda salah</p>
                                                        <p>Jawaban Benar : Benar</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               -->

                                            <div class="flex justify-center items-center mt-10 text-center">
                                                <a class="btn" href="{{ route('hasil_kuis') }}" style="background-image: linear-gradient(135deg, #09c778, #01a0f9); color: #fff;">
                                                    Kembali
                                                </a>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</body>

</html>
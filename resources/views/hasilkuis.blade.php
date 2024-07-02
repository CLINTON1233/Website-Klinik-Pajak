<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Quiz</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/konfirmasikuis.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
</head>

<body>
    @include('layout.navbar4')

    <br><br><br><br>
    <div class="container mt-5 mb-1">
        <div class="header-container">
            <h3><img src="{{ asset('images/kuislogo.png') }}" alt="" class="small-img"> Kuis PPh 21: Penghitungan PPh 21</h3>
        </div>
    </div>
    <div class="container">
        <div class="box1">
            <div class="text-container">
                <h3>Hasil Kuis Pajak</h3>
                <div class="summary">
                    <table>
                        <tr>
                            <th>Status</th>
                            <th>Nilai/100.00</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal</th>
                            <th>Evaluasi</th>
                        </tr>
                        <tr class="odd">
                            <td>Selesai<br>Dikirim {{ session('riwayat')->tanggal }}</td>
                            <td>{{ session('riwayat')->skor_akhir }}/100.00</td>
                            <td>{{ session('riwayat')->nama }}</td>
                            <td>{{ session('riwayat')->email }}</td>
                            <td>{{ session('riwayat')->tanggal }}</td>
                            <td><a href="{{ route('evaluasi_kuis') }}">Evaluasi</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
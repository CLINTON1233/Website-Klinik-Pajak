<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Quiz</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/konfirmasikuis.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <style>

    </style>
</head>

<body>
    @include('layout.navbar4')

    <br><br><br><br>
    <div class="container mt-5 mb-1">
        <div class="header-container">
            <h3> <img src="{{ asset('images/kuislogo.png') }}" alt="" class="small-img"> Kuis PPh 21: Penghitungan PPh 21</h3>
        </div>
    </div>
    <div class="container">
        <div class="box1">
            <div class="text-container">
                <h3>Hasil Kuis Pajak</h3>
                <div class="summary">
                    <h3>Ringkasan Pengerjaan Kuis</h3>
                    <table>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Skor Akhir</th>
                            <th>Tanggal</th>
                        </tr>
                        <tr>
                            <td>{{ session('riwayat')->nama }}</td>
                            <td>{{ session('riwayat')->email }}</td>
                            <td>{{ session('riwayat')->skor_akhir }}</td>
                            <td>{{ session('riwayat')->tanggal }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
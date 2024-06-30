<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Konfirmasi Kuis</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/konfirmasikuis.css') }}">
    <style>

    </style>
</head>

<body>
    @include('layout.navbar4')
    <br><br><br><br>
    <div class="container mt-5 mb-2">
        <div class="header-container">
            <h3> <img src="{{ asset('images/kuislogo.png') }}" alt="" class="small-img"> Kuis PPh 21: Penghitungan PPh 21</h3>
        </div>
    </div>
    <div class="container mt-2 mb-5">
        <div class="box1">
            <div class="text-container mt-4 ml-4">
                <h3>Kuis PPh 21 Penghitungan PPh 21</h3>
                <h3>Rangkuman Jawaban</h3>
                <div class="questions">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                        </tr>
                        @foreach($soalList as $index => $soal)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $soal->jawaban ? 'Jawaban disimpan' : 'Belum dijawab' }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="box3">
            <div class="button-container mt-4 ml-4">
                <ol>
                    @foreach($soalList as $index => $soal)
                    <button class="number-button{{ $index + 1 }}">{{ $index + 1 }}</button>
                    @endforeach
                </ol><br><br>
                <button class="finish-button">Selesai</button>
            </div>
        </div>
    </div>
    <div class="bottom-buttons">
        <a href="{{ route('quiz1_pajak') }}"><button class="back-button">Kembali ke Soal</button></a>

        <form action="{{ route('send_answers') }}" method="POST">
            @csrf
            <input type="hidden" name="nama" value="{{ session('nama') }}">
            <input type="hidden" name="email" value="{{ session('email') }}">
            <button type="submit" class="send-button">Kirim Jawaban</button>
        </form>
    </div>
    <footer>
        <div class="footer">
            <p>&copy; Copyrights 2023 Polibatam</p>
        </div>
    </footer>
</body>

</html>
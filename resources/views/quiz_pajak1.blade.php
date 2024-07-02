<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Quiz</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/kuispajak2.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <style>
        /* Add your styles here */
    </style>
</head>

<body>
    @include('layout.navbar4')

    <br><br>
    <div class="mt-5 mb-5">
        <img src="{{ asset('images/kuislogo.png') }}" alt="" class="small-img" style="margin-top: 30px; margin-left: 300px">
        <div class="text">
            <h5>Kuis PPh 21: Penghitungan PPh 21</h5>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="box ">
            <div class="text-left mt-4 ml-4 ">
                <h4 class="no-margin">Pertanyaan {{ $currentIndex + 1 }}</h4>
                @if ($soal->jawaban)
                <p><span class="green-text">Jawaban disimpan</span></p>
                @else
                <p><span class="red-text">Tidak ada jawaban</span></p>
                @endif
            </div>
            <div class="container mt-5 mb-5">
                <div class="box1 ">
                    <div class="time-box">
                        <p>Sisa Waktu 00:00</p>
                    </div>
                    <div class="text-container mt-4 ml-4">
                        <p><span class="text-left lowered-text">{{ $soal->soal }}</span></p>
                        <div class="radio-container">
                            <form>
                                @foreach(['a', 'b', 'c', 'd', 'e'] as $option)
                                @if(!empty($soal->{'pilihan_' . $option}))
                                <input type="radio" id="option{{ $option }}" name="pph" value="{{ $soal->{'pilihan_' . $option} }}">
                                <label for="option{{ $option }}">{{ $soal->{'pilihan_' . $option} }}</label><br>
                                @endif
                                @endforeach
                            </form>
                        </div>
                    </div>
                    <div class="box3">
                        <div class="button mt-4 ml-4">
                            <ol style="list-style-type:none; padding:0;">
                                @foreach($soalList as $index => $soalItem)
                                <li style="display: inline-block; margin-right: 10px;">
                                    <form method="GET" action="{{ route('next_quiz', ['currentIndex' => $index]) }}">
                                        <button type="submit" class="number-button{{ $index === $currentIndex ? ' active' : '' }}">
                                            {{ $index + 1 }}
                                        </button>
                                    </form>

                                </li>
                                @endforeach
                            </ol><br><br>
                            <a href="{{ route('konfirmasi_kuis') }}"><button class="finish-button">Selesai</button></a>
                        </div>
                        <form method="GET" action="{{ route('next_quiz', ['currentIndex' => $currentIndex]) }}">
                            <button type="submit" class="next-button">Selanjutnya</button>
                            <a href="{{ route('quiz1_pajak') }}"><button class="awal-button">Kembali</button></a>
                        </form>
                    </div>

                </div>
            </div>

            <footer>
                <div class="footer">
                    <p>&copy; Copyrights 2023 Polibatam</p>
                </div>
            </footer>

</body>

</html>
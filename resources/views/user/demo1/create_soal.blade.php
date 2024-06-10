<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="{{ asset('js/jquery/jquery-3.7.1.js') }}"></script>
    <title>Tambah Soal | Sudut Pajak</title>
    <style>
        .block {
            display: block;
            height: 50px;
            width: 8px;
            margin-right: 5px;
            background: linear-gradient(41deg, #09c778, #01a0f9);
        }

        .btn {
            background: linear-gradient(41deg, #09c778, #01a0f9);
        }
    </style>
</head>

<body>
    @include('user.demo1.layout.sidebar')

    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <div class="d-flex align-items-center mb-3">
                        <div class="block"></div>
                        <h4 class="page-title fw-bold">Tambah Soal</h4>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('store_soal', ['id' => $soal->id]) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="3" placeholder="Pertanyaan Soal"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="skor" class="form-label">Skor</label>
                                <input type="number" class="form-control" id="skor" name="skor" placeholder="Skor Soal">
                            </div>
                            <div class="mb-5">
                                <p>Tipe Soal</p>
                                <div class="d-flex grid gap-3">
                                    <input type="radio" id="pilihan_ganda" name="tipe_soal" value="Pilihan Ganda" checked>
                                    <label for="pilihan_ganda">Pilihan Ganda</label>
                                    <input type="radio" id="esai" name="tipe_soal" value="Esai">
                                    <label for="esai">Esai</label>
                                </div>                                    
                            </div>
                            <div id="soalPilihanGanda" class="">
                                <div class="mb-3">
                                    <h3 class="fw-bold">Pilihan Ganda</h3>
                                </div>
                                <div class="row gap-3">
                                    @foreach(['A', 'B', 'C', 'D', 'E'] as $index => $option)
                                    <div class="d-flex grid gap-1">
                                        <div class="badge text-bg-light rounded px-3">
                                            <p class="fs-6 my-auto">{{ $option }}.</p>
                                        </div>
                                        <input type="text" class="form-control" id="pilihan_{{ strtolower($option) }}" name="pilihan_{{ strtolower($option) }}" placeholder="Isi Pilihan Ganda">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="jawaban" id="jawaban_{{ strtolower($option) }}" value="{{ strtolower($option) }}">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="soalEsai" class="visually-hidden"></div>
                            <div class="mt-5" id="submit">
                                <button type="submit" class="btn text-white">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('user.demo1.layout.footer')
    </div>

    <script>
        $(document).ready(function() {
            $('input[name="tipe_soal"]').on('change', function() {
                var selectedValue = $(this).val();
                if (selectedValue == 'Pilihan Ganda') {
                    $('#soalPilihanGanda').removeClass('visually-hidden');
                    $('#soalEsai').addClass('visually-hidden');
                } else {
                    $('#soalPilihanGanda').addClass('visually-hidden');
                    $('#soalEsai').removeClass('visually-hidden');
                }
            });
        });
    </script>
</body>

</html>

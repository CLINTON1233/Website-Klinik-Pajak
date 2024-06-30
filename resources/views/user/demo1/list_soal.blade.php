<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Soal Kuis | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

        .fa-plus-circle {
            margin-right: 5px;
            color: white;
        }

        .table-1 table thead {
            background: linear-gradient(41deg, #09c778, #01a0f9);
            color: white;
            text-align: center;
            padding: 800px;
        }

        .table-1 td.list-soal {
            max-width: 300px;
            text-align: left;
        }

        .btn-delete,
        .btn-edit {
            color: white;
            border: none;
            background: linear-gradient(41deg, #09c778, #01a0f9);
        }

        .btn-kirim {
            margin-top: 100px;
            color: white;
            border: none;
            width: 130px;
            background: linear-gradient(41deg, #09c778, #01a0f9);
        }

        .font {
            font-size: 18px;
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
                        <h4 class="page-title fw-bold">Daftar Soal Kuis</h4>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-1">
                                <a href="{{ route('edit_kuis', ['id' => $kuis->id]) }}" class="btn">
                                    <span class="text-white">Edit Kuis</span>
                                </a>
                            </div>
                            <div class="d-flex justify-content-end col-11">
                                <a href="{{ route('create_soal', ['id' => $soal->id]) }}" class="btn">
                                    <i class="fas fa-plus-circle"></i>
                                    <span class="tambah text-white">Tambah Soal</span>
                                </a>
                            </div>
                        </div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <p class="fw-bold fs-3">Judul Kuis : </p>
                                    </td>
                                    <td>
                                        <p>{{ $kuis->judul_kuis }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="fw-bold fs-3">Waktu Kuis : </p>
                                    </td>
                                    <td>
                                        <p>{{ $kuis->waktu }} Menit</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-1">
                                <div class="table-1">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Soal</th>
                                                <th scope="col">Skor</th>
                                                <th scope="col">Jawaban</th>
                                                <th scope="col">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($soalList as $soal)
                                            <tr>
                                                <td class="list-soal">{{ $soal->soal }}</td>
                                                <td class="text-center">{{ $soal->skor }}</td>
                                                <td class="text-center">{{ $soal->jawaban }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('edit_soal', ['id' => $soal->id]) }}" class="btn btn-edit mr-2">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $soal->id }}" action="{{ route('delete_soal', ['id' => $soal->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('user.demo1.layout.footer')
    </div>
</body>
<script>
    $(document).ready(function() {
        // Fungsi delete
        $('.btn-delete').click(function(event) {
            event.preventDefault(); // Menghentikan aksi default dari tombol submit

            var form = $(this).closest('form'); // Mendapatkan form terdekat dari tombol delete yang diklik

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                confirmButtonColor: '#008000', // Warna hijau untuk tombol "Ya, hapus!"
                cancelButtonText: 'Tidak, batalkan!',
                cancelButtonColor: '#FF0000', // Warna merah untuk tombol "Tidak, batalkan!"
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit form jika pengguna mengonfirmasi penghapusan
                }
            });
        });
    });
</script>


</html>
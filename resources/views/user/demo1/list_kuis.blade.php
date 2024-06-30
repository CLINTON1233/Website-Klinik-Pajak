<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Kuis | Sudut Pajak</title>
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

        .tambah {
            color: white;
        }

        .table-1 table thead {
            background: linear-gradient(41deg, #09c778, #01a0f9);
            color: white;
            text-align: center;
            padding: 800px;
        }

        .table-1 th {
            padding: 20px 60px 20px 50px;
        }

        .table-1 td {
            text-align: center;
            padding: 20px 55px;
        }

        .btn-delete {
            color: white;
            border: none;
            background: linear-gradient(41deg, #09c778, #01a0f9);
        }

        .btn-edit {
            color: white;
            border: none;
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
                        <h4 class="page-title fw-bold">List Kuis</h4>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('create_kuis') }}" class="btn">
                                <i class="fas fa-plus-circle"></i>
                                <span class="tambah text-white" required>Tambah Kuis</span>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-1">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Judul Kuis</th>
                                                <th scope="col">Waktu</th>
                                                <th scope="col">Jumlah Soal</th>
                                                <th scope="col">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kuisList as $index => $kuis)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $kuis->judul_kuis }}</td>
                                                <td>{{ $kuis->waktu }} menit</td>
                                                <td>{{ $kuis->jumlah_soal }} soal</td>
                                                <td>
                                                    <a href="{{ route('list_soal', ['id' => $kuis->id]) }}"><i class="fa fa-edit btn btn-edit"></i></a>
                                                    <form id="delete-form-{{ $kuis->id }}" action="{{ route('delete_kuis', ['id' => $kuis->id]) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="fa fa-trash btn btn-delete ml-2"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('user.demo1.layout.footer')
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi delete
        document.querySelectorAll('.btn-delete').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Menghentikan aksi default dari tombol submit

                var form = this.closest('form'); // Mendapatkan form terdekat dari tombol delete yang diklik

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
    });
</script>

</html>
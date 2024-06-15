<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Konsultan | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
</head>

<body>
    @include('user.demo1.layout.sidebar')

    <!-- Data Table start -->
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">List Konsultan</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="{{ route('dashboard') }}">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="row">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">List Konsultan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Unique ID</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Bio</th>
                                                        <th scope="col">Profil Pic</th>
                                                        <th scope="col">Alumnus</th>
                                                        <th scope="col">Bidang</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Pengalaman</th>
                                                        <th scope="col">Jenjang Karir</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($konsultans as $konsultan)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $konsultan->unique_id }}</td>
                                                        <td>{{ $konsultan->nama }}</td>
                                                        <td>{{ $konsultan->email }}</td>
                                                        <td>{{ $konsultan->bio }}</td>
                                                        <td><img src="{{ asset('img/konsultan_profil/' . $konsultan->profil_pic) }}" alt="Profil Pic" width="50" height="50"></td>
                                                        <td>{{ $konsultan->alumnus }}</td>
                                                        <td>{{ $konsultan->bidang }}</td>
                                                        <td>{{ $konsultan->status }}</td>
                                                        <td>{{ $konsultan->pengalaman }}</td>
                                                        <td>{{ $konsultan->jenjang_karir }}</td>
                                                        <td>
                                                            <a href="{{ route('detail_konsultan', ['id' => $konsultan->id_konsultan]) }}" class="btn btn-primary btn-sm">Detail</a>
                                                            <button onclick="deleteData('{{ $konsultan->id_konsultan }}')" class="btn btn-danger btn-sm">Delete</button>
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
            </div>
        </div>

    </div>
    @include('user.demo1.layout.footer')

    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/setting-demo2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Tambahkan library SweetAlert 2 -->
    <script>
        function deleteData(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn mr-1 btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Apa kamu yakin?',
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, batalkan!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengirim permintaan AJAX untuk menghapus data
                    $.ajax({
                        type: "DELETE", // Mengubah method menjadi DELETE
                        url: "{{ url('/user/demo1/delete_konsultan') }}/" + id, // Menambahkan parameter id ke URL
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            // Menampilkan pesan sukses menggunakan SweetAlert 2
                            swalWithBootstrapButtons.fire({
                                title: 'Berhasil',
                                text: 'Data berhasil dihapus.',
                                icon: 'success',
                                confirmButtonColor: '#008000'
                            }).then(() => {
                                // Reload halaman setelah menghapus data
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Menampilkan pesan error menggunakan SweetAlert 2
                            swalWithBootstrapButtons.fire({
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data.',
                                icon: 'error',
                                confirmButtonColor: '#dc3545'
                            });
                        }
                    });
                } else if (
                    // Tidak melakukan apa pun jika pengguna membatalkan
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Batalkan',
                        'Data anda aman.',
                        'error'
                    );
                }
            });
        }
    </script>
</body>

</html>
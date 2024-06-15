<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Usaha | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    @include('user.demo1.layout.sidebar')

    <!-- Data Table start -->
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">List Usaha</h4>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th style="width: 10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kategoriUsaha as $usaha)
                                            <tr>
                                                <td>{{ $usaha->judul }}</td>
                                                <td>{{ $usaha->deskripsi }}</td>
                                                <td style="width: 20%">
                                                    <div class="form-button-action">
                                                        <a href="{{ route('edit_usaha', $usaha->id) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <form id="delete-form-{{ $usaha->id }}" action="{{ route('delete_usaha', ['id' => $usaha->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" onclick="deleteConfirmation('{{ $usaha->id }}')" class="btn btn-link btn-danger" data-toggle="tooltip" title="Remove">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Data Table End -->
    </div>
    @include('user.demo1.layout.footer')

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script> <!-- Menggunakan asset() untuk path -->
    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script> <!-- Menggunakan asset() untuk path -->

    <script>
        $(document).ready(function() {
            $('#add-row').DataTable();
        });

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
                    $.ajax({
                        type: "POST",
                        url: "{{ route('delete_usaha', ':id') }}".replace(':id', id), // Menggunakan route() untuk path
                        data: {
                            id: id,
                            type: 'hapus'
                        },
                        success: function(res) {
                            if (res.status === 'error') {
                                Swal.fire({
                                    title: res.data,
                                    icon: 'error',
                                    confirmButtonColor: '#008000',
                                });
                                return;
                            }
                            Swal.fire({
                                title: 'Berhasil',
                                icon: 'success',
                                confirmButtonColor: '#008000',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(); // Reload halaman setelah penghapusan berhasil
                                }
                            });
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        'Batalkan',
                        'File anda aman!',
                        'error'
                    );
                }
            });
        }
    </script>
    <script>
        function deleteConfirmation(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn mr-1 btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                confirmButtonColor: '#008000',
                cancelButtonText: 'Tidak, batalkan!',
                cancelButtonColor: '#FF0000',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form-' + id).submit(); // Submit form jika pengguna mengonfirmasi penghapusan
                }
            });
        }
    </script>
</body>

</html>
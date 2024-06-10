<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Berita | Sudut Pajak </title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin/datatables/datatables.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('user.demo1.layout.sidebar')

    <!-- Data Table start -->
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">List Berita</h4>
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
                                                <th>Kategori</th>
                                                <th style="width: 10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listarticle as $article)
                                                <tr>
                                                    <td>{{ $article->judul }}</td>
                                                    <td>{{ $article->kategori }}</td>
                                                    <td style="width: 20%">
                                                        <div class="form-button-action">
                                                            <a href="{{ route('berita.edit', $article->id) }}" class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" data-original-title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $article->id }}" action="{{ route('delete.berita', $article->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-link btn-danger btn-delete" data-toggle="tooltip" data-original-title="Hapus">
                                                                    <i class="fas fa-trash"></i>
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
    </div>
    <!-- Data Table End -->
    
    @include('user.demo1.layout.footer')

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#add-row').DataTable();
        });
    </script>
    
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

</body>
</html>

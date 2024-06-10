<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Peraturan | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('user.demo1.layout.sidebar')

    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">List Peraturan Pajak</h4>
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
                                            @foreach ($peraturanPajak as $pajak)
                                                <tr>
                                                    <td>{{ $pajak->judul }}</td>
                                                    <td>{{ $pajak->kategori }}</td>
                                                    <td style="width: 20%">
                                                        <div class="form-button-action">
                                                            <a href="{{ route('edit.pajak', $pajak->id) }}" class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('delete.pajak', $pajak->id) }}" method="POST" id="delete-form-{{ $pajak->id }}" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-link btn-danger btn-delete" data-toggle="tooltip" title="Hapus">
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

    @include('user.demo1.layout.footer')

    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Atlantis DEMO methods, jangan sertakan dalam proyek -->
    <script src="{{ asset('assets/js/setting-demo2.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});

            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });

            $('#add-row').DataTable({
                "pageLength": 5,
            });

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');
            });
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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Peraturan | Sudut Pajak </title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
</head>
<body>
    @include('user.demo1.layout.sidebar')
    <!-- Data Table start -->
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Form Input Peraturan Pajak </h4>
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
                            <form action="{{ route('pajak.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul <b class="text-danger">*</b> </label>
                                        <input name="judul" type="text" class="form-control" id="judul" placeholder="">
                                        @error('judul')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi <b class="text-danger">*</b> </label>
                                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
                                        @error('deskripsi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label for="kategori" class="form-label">Kategori <b class="text-danger">*</b> </label>
                                    <div class="input-group mb-3">
                                        <select name="kategori" class="custom-select" id="kategori">
                                            <option selected>Pilih...</option>
                                            <option value="Peraturan Pajak Daerah">Peraturan Pajak Daerah</option>
                                            <option value="Peraturan Pajak Pusat">Peraturan Pajak Pusat</option>
                                            <option value="Peraturan Pajak Daerah Kota Batam">Peraturan Pajak Daerah Kota Batam</option>
                                        </select>
                                        @error('kategori')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="kategori">Pilihan <b class="text-danger">*</b> </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="file_pdf" class="form-label">File PDF</label>
                                        <input name="file_pdf" class="form-control" type="file" id="file_pdf" accept=".pdf">
                                        @error('file_pdf')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('user.demo1.layout.footer')
    <script>
        function clicked() {
            data = {
                judul: $("#judul").val(),
                deskripsi: $("#deskripsi").val(),
                file: $("#file")[0].files,
                kategori: $("#kategori").val(),
            }
            var fd = new FormData();
            fd.append('judul', data.judul);
            fd.append('deskripsi', data.deskripsi);
            fd.append('file', data.file[0]);
            fd.append('kategori', data.kategori);
            console.log(fd);
            $.ajax({
                type: "POST",
                processData: false,
                contentType: false,
                cache: false,
                data: fd,
                enctype: 'multipart/form-data',
                url: "{{ route('pajak.store') }}",
                success: function(res) {
                    if (res.status === 'error') {
                        Swal.fire({
                            title: res.data,
                            icon: 'error',
                            confirmButtonColor: '#008000',
                        })
                        return;
                    }
                    data = res;
                    Swal.fire({
                        title: 'Berhasil',
                        icon: 'success',
                        confirmButtonColor: '#008000',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = data.data;
                        }
                    })
                }
            });
        }
    </script>
</body>
</html>

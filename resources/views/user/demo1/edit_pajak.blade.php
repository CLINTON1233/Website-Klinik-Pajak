<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Peraturan | Sudut Pajak </title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <!-- Ubah path untuk file CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('user.demo1.layout.sidebar') <!-- Ubah path untuk include file sidebar.php -->
    <!-- Data Table start -->
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Edit Peraturan Pajak</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="{{ route('dashboard') }}"> <!-- Ubah path untuk link ke dashboard -->
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('pajak.update', $pajak->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Judul</label>
                                        <input name="judul" value="{{ $pajak['judul'] }}" type="text" class="form-control" id="judul" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{ $pajak['deskripsi'] }}</textarea>
                                    </div>
                                    <label for="texarea" class="form-label">Kategori</label>
                                    <div class="input-group mb-3"><br>
                                        <select name="kategori" class="custom-select" id="kategori">
                                            <option selected>Pilih...</option>
                                            <option value="Peraturan Pajak Daerah" {{ $pajak['kategori'] == "Peraturan Pajak Daerah" ? 'selected="selected"'  : '' }}>Peraturan Pajak Daerah</option>
                                            <option value="Peraturan Pajak Pusat" {{ $pajak['kategori'] == "Peraturan Pajak Pusat" ? 'selected="selected"'  : '' }}>Peraturan Pajak Pusat</option>
                                            <option value="Peraturan Pajak Daerah Kota Batam" {{ $pajak['kategori'] == "Peraturan Pajak Daerah Kota Batam" ? 'selected="selected"'  : '' }}>Peraturan Pajak Daerah Kota Batam</option>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="inputGroupSelect02">Pilihan</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">File PDF</label>
                                        <input name="file_pdf" class="form-control" type="file" id="file_pdf" accept=".pdf">
                                    </div>
                                    <button type="submit" onclick="clicked8()" id="alert_demo_4" class="btn btn-primary">Submit</button>
                                </form>
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
    @include('user.demo1.layout.footer') <!-- Ubah path untuk include file footer.php -->
    <!-- Ubah path untuk file JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function clicked8() {
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
            // console.log(window.location.href)
            $.ajax({
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                type: "POST",
                processData: false,
                contentType: false,
                cache: false,
                data: fd,
                enctype: 'multipart/form-data',
                url: window.location.href,
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

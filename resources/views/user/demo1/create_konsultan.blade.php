<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Konsultan | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <style>
        /* Tambahkan CSS kustom di sini */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .main-panel {
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        input[type="file"] {
            padding: 6px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    @include('user.demo1.layout.sidebar')

    <!-- Form start -->
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Form Tambah Konsultan</h4>
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
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Konsultan</h6>
                            </div>
                            <div class="card-body">
                            <form action="{{ route('store_konsultan') }}" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="form-group">
                                        <label for="nama">Nama: <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email: <b class="text-danger">*</b></label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password: <b class="text-danger">*</b></label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">Bio: <b class="text-danger">*</b></label>
                                        <textarea class="form-control" id="bio" name="bio" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="profil_pic">Profil Picture: <b class="text-danger">*</b></label>
                                        <input type="file" class="form-control" id="profil_pic" name="profil_pic" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alumnus">Alumnus: <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="alumnus" name="alumnus" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bidang">Bidang: <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="bidang" name="bidang" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pengalaman">Pengalaman: <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="pengalaman" name="pengalaman" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenjang_karir">Jenjang Karir: <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="jenjang_karir" name="jenjang_karir" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah Konsultan</button>
                                </form>
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
        function clicked() {
            data = {
                judul: $("#judul").val(),
                isi: $("#isi").val(),
                cover: $("#cover")[0].files,
                file_pdf: $("#file_pdf")[0].files,
                file_ppt: $("#file_ppt")[0].files,
                ytb: $("#ytb").val(),

            }
            var fd = new FormData();
            fd.append('judul', data.judul);
            fd.append('isi', data.isi);
            fd.append('cover', data.cover[0]);
            fd.append('file_pdf', data.file_pdf[0]);
            fd.append('file_ppt', data.file_ppt[0]);
            fd.append('ytb', data.ytb);
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


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Peraturan | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/favicon.png">
</head>
<body>
    @include('user.demo1.layout.sidebar') <!-- Menggunakan fungsi include untuk memanggil layout sidebar -->
    <!-- Data Table start -->
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Form Input Materi Pelatihan</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home"></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('store_pelatihan') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul <b class="text-danger">*</b> </label>
                                        <input name="judul" type="text" class="form-control" id="judul" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="isi" class="form-label">Deskripsi <b class="text-danger">*</b> </label>
                                        <textarea name="isi" class="form-control" id="isi" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cover" class="form-label">Gambar <b class="text-danger">*</b> </label>
                                        <input name="cover" class="form-control" type="file" id="cover" accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="file_pdf" class="form-label">File PDF <b class="text-danger">*</b> </label>
                                        <input name="file_pdf" class="form-control" type="file" id="file_pdf" accept=".pdf">
                                    </div>
                                    <div class="mb-3">
                                        <label for="file_ppt" class="form-label">File PPT <b class="text-danger">*</b> </label>
                                        <input name="file_ppt" class="form-control" type="file" id="file_ppt" accept=".pptx,.ppt">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ytb" class="form-label">Link Youtube <b class="text-danger">*</b> </label>
                                        <input name="ytb" type="text" class="form-control" id="ytb" placeholder="">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('user.demo1.layout.footer') 
        </div>
    </div>
</body>
</html>

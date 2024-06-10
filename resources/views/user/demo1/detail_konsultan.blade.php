<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Konsultan | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    @include('user.demo1.layout.sidebar')

    <!-- Content -->
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Detail Konsultan</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <p class="card-text">Nama Konsultan: {{ $konsultan->nama }}</p>
                                <p class="card-text">Email: {{ $konsultan->email }}</p>
                                <p class="card-text">Bio: {{ $konsultan->bio }}</p>
                                <p class="card-text">Alumnus: {{ $konsultan->alumnus }}</p>
                                <p class="card-text">Bidang: {{ $konsultan->bidang }}</p>
                                <p class="card-text">Status: {{ $konsultan->status }}</p>
                                <p class="card-text">Pengalaman: {{ $konsultan->pengalaman }}</p>
                                <p class="card-text">Jenjang Karir: {{ $konsultan->jenjang_karir }}</p>
                                <p class="card-text">No: {{ $konsultan->id }}</p>
                                <p class="card-text">Unique ID: {{ $konsultan->unique_id }}</p>
                                <p class="card-text">Profil Pic: <img src="{{ asset('img/konsultan_profil/' . $konsultan->profil_pic) }}" alt="Profil Pic" width="50" height="50"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    @include('user.demo1.layout.footer')

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>

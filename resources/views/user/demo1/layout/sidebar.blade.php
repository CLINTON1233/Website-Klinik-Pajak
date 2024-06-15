<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dashboard | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset("assets/css/fonts.min.css") }}']
            },

            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    <style>
        .fixed-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            /* Adjust as needed */
            height: 100%;
            z-index: 1000;
            background-color: #fff;
            /* Adjust as needed */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            margin-left: 250px;
            /* Adjust as needed */
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">
                <a href="{{ route('dashboard') }}" class="logo">
                    <img style="width:90px;" src="{{ asset('assets/img/logo.png') }}" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('tables/upload_profil/adminpria.png') }}" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg">
                                                <img src="{{ asset('tables/upload_profil/adminpria.png') }}" alt="image profile" class="avatar-img rounded">
                                            </div>
                                            <div class="u-text">
                                                <h4>Admin</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">Profil</a>
                                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2 fixed-sidebar">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <!-- User -->
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img aria-label="User's Profile Picture" src="{{ asset('tables/upload_profil/adminpria.png') }}" alt="User's Profile Picture" class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    <span class="wrap2">Admin</span>
                                    <span class="user-level">Admin</span>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- End User -->

                    <ul class="nav nav-primary">
                        <li class="nav-item {{ request()->is('user/demo1/index') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <!-- End Dashboard -->

                        <!-- Menu -->
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Menu</h4>
                        </li>

                        <!--Berita-->

                        <li class="nav-item {{ request()->is('user/demo1/create_berita') || request()->is('user/demo1/list_berita') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#berita">
                                <i class="fas fa-newspaper"></i>
                                <p>Manajemen Berita</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ request()->is('user/demo1/create_berita') || request()->is('user/demo1/edit_berita/*') || request()->is('user/demo1/list_berita') ? 'show' : '' }}" id="berita">
                                <ul class="nav nav-collapse">
                                    <li class="{{ request()->is('user/demo1/create_berita') || request()->is('user/demo1/edit_berita/*') ? 'active' : '' }}">
                                        <a href="{{ route('berita.create') }}">
                                            <span class="sub-item">Tambah Berita</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->is('user/demo1/list_berita') ? 'active' : '' }}">
                                        <a href="{{ route('list_berita') }}">
                                            <span class="sub-item">List Berita</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!--Usaha-->
                        <li class="nav-item <?= (request()->is('user/demo1/list_usaha')) ? 'active' : '' ?>">
                            <a data-toggle="collapse" href="#usaha">
                                <i class="fas fa-newspaper"></i>
                                <p>Manajemen Usaha</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse <?= (request()->is('user/demo1/create_usaha') || request()->is('user/demo1/edit_usaha') || request()->is('user/demo1/list_usaha')) ? 'show' : '' ?>" id="usaha">
                                <ul class="nav nav-collapse">
                                    <li class="{{ request()->is('user/demo1/create_usaha') || request()->is('user/demo1/edit_usaha/') ? 'active' : '' }}">
                                        <a href="{{ route('create_usaha') }}">
                                            <span class="sub-item">Tambah Usaha</span>
                                        </a>
                                    </li>
                                    <li class="<?= (request()->is('user/demo1/list_usaha')) ? 'active' : '' ?>">
                                        <a href="{{ route('list_usaha') }}">
                                            <span class="sub-item">List Usaha</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <!-- Pajak -->
                        <li class="nav-item {{ (request()->is('user/demo1/create_pajak') || request()->is('user/demo1/list_pajak')) ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#peraturan">
                                <i class="far fa-newspaper"></i>
                                <p>Manajemen Pajak</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ (request()->is('user/demo1/create_pajak') || request()->is('user/demo1/edit_pajak/*') || request()->is('user/demo1/list_pajak')) ? 'show' : '' }}" id="peraturan">
                                <ul class="nav nav-collapse">
                                    <li class="{{ request()->is('user/demo1/create_pajak') || request()->is('user/demo1/edit_pajak/*') ? 'active' : '' }}">
                                        <a href="{{ route('pajak.create') }}">
                                            <span class="sub-item">Tambah Pajak</span>
                                        </a>
                                    </li>
                                    <li class="{{ (request()->is('user/demo1/list_pajak')) ? 'active' : '' }}">
                                        <a href="{{ route('list_pajak') }}">
                                            <span class="sub-item">List Pajak</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <!-- Pelatihan -->
                        <li class="nav-item {{ (url()->full() == url('/') . '/user/demo1/create_pelatihan.php' || url()->full() == url('/') . '/user/demo1/list_pelatihan.php') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#pelatihan">
                                <i class="fas fa-user-plus"></i>
                                <p>Manajemen Pelatihan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ (url()->full() == url('/') . '/user/demo1/create_pelatihan' || (explode('?', url()->full())[0] == url('/') . '/user/demo1/edit_pelatihan') || url()->full() == url('/') . '/user/demo1/list_pelatihan') ? 'show' : '' }}" id="pelatihan">
                                <ul class="nav nav-collapse">
                                    <li class="{{ (url()->full() == url('/') . '/user/demo1/create_pelatihan') || (url()->full() == url('/') . '/user/demo1/edit_pelatihan') ? 'active' : '' }}">
                                        <a href="{{ url('/user/demo1/create_pelatihan') }}">
                                            <span class="sub-item">Tambah Materi</span>
                                        </a>
                                    </li>
                                    <li class="{{ (url()->full() == url('/') . '/user/demo1/list_pelatihan') ? 'active' : '' }}">
                                        <a href="{{ url('/user/demo1/list_pelatihan') }}">
                                            <span class="sub-item">List Materi</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Konsultan -->
                        <li class="nav-item {{ request()->is('user/demo1/create_konsultan') || request()->is('user/demo1/list_konsultan') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#konsultan">
                                <i class="fas fa-user-plus"></i>
                                <p>Manajemen Konsultan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ request()->is('user/demo1/create_konsultan') || request()->is('user/demo1/edit_konsultan/*') || request()->is('user/demo1/list_konsultan') ? 'show' : '' }}" id="konsultan">
                                <ul class="nav nav-collapse">
                                    <li class="{{ request()->is('user/demo1/create_konsultan') || request()->is('user/demo1/edit_konsultan/*') ? 'active' : '' }}">
                                        <a href="{{ route('create_konsultan') }}">
                                            <span class="sub-item">Tambah Konsultan</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->is('user/demo1/list_konsultan') ? 'active' : '' }}">
                                        <a href="{{ route('list_konsultan') }}">
                                            <span class="sub-item">List Konsultan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <!--Kuis-->
                        <li class="nav-item {{ (Request::is('user/demo1/list_kuis') || Request::is('user/demo1/riwayat_pengerjaan')) ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#kuis">
                                <i class="far fa-list-alt"></i>
                                <p>Manajemen Kuis</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ (Request::is('user/demo1/list_kuis') || Request::is('user/demo1/create_kuis') || Request::is('user/demo1/list_soal') || Request::is('user/demo1/riwayat_kuis')) ? 'show' : '' }}" id="kuis">
                                <ul class="nav nav-collapse">
                                    <li class="{{ (Request::is('user/demo1/list_kuis') || Request::is('user/demo1/create_kuis') || Request::is('user/demo1/list_soal')) ? 'active' : '' }}">
                                        <a href="{{ url('/user/demo1/list_kuis') }}">
                                            <span class="sub-item">List Kuis</span>
                                        </a>
                                    </li>
                                    <li class="{{ (Request::is('user/demo1/riwayat_kuis')) ? 'active' : '' }}">
                                        <a href="{{ url('/user/demo1/riwayat_kuis') }}">
                                            <span class="sub-item">Riwayat Pengerjaan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Logout -->
                        <<li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf <!-- Tambahkan token CSRF -->
                            </form>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                            </li>


                            <!-- End Pengguna -->

                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->



        <!-- Scripts -->
        <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
</body>

</html>
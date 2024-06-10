<head>
    <title>Konsultasi | Sudut Pajak</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
</head>
@include ('layout.navbar4')

<?php

session_start();


include('conf/config.php');
$query = mysqli_query($koneksi, "SELECT * FROM `tb_konsultan`");

if (isset($_GET['error'])) {
    $error = $_GET['error'];

    if ($error == "password") {
        echo '<div id="passwordAlert" class="alert alert-danger" role="alert">Password tidak cocok. Silakan coba lagi.</div>';
    } elseif ($error == "email") {
        echo '<div id="emailAlert" class="alert alert-danger" role="alert">Email tidak ditemukan. Silakan coba lagi.</div>';
    }
}
?>
<script>
    // Menghilangkan alert setelah beberapa detik
    setTimeout(function () {
        document.getElementById("passwordAlert").style.display = "none";
        document.getElementById("emailAlert").style.display = "none";
    }, 3000); // Waktu dalam milidetik (3000ms = 3 detik)

</script>

<!-- konsultasi -->
<style>
    .carousel .carousel-indicators li {
        background-color: #7e9fbb;

    }

    .carousel .carousel-indicators li.active {
        background-color:
            #01a0f9;

    }

</style>
<section>

    <div class="container mt-5 pt-2">
        <div class="row border-bottom ">
            <div class="tutorialChatIlustration col-12 col-sm-5  p-3 border-end ">
                <div class="row text-center justify-content-center my-5">

                    <div class="col-9">
                        <h5 class="fs-6 fw-bold">Chat Spesialis Pajak</h5>
                        <p class="mt-3">Layanan konsultasi kebutuhan Pajak Anda dengan Kami</p>
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators ">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/Konsultasi1.png" class="d-block w-80" alt="...">
                                    <div class="carousel-caption d-none">
                                        <h5>Second slide label</h5>

                                    </div>
                                    <p class="pb-20 font-weight-bold">Sudut pajak memiliki spesialis yang berkompeten
                                        terhadap permasalahan pajak yang dialami oleh klien.</p>
                                </div>
                                <div class="carousel-item">
                                    <img src="images/Pajak.png" class="d-block w-80" alt="...">
                                    <div class="carousel-caption d-none">


                                    </div>
                                    <p class="pb-20 font-weight-bold">Sudut pajak menyediakan 2 (dua) metode konsultasi:
                                        Live chat maupun via Microsoft team. </p>
                                </div>
                                <div class="carousel-item">
                                    <img src="images/Konsultasi1.png" class="d-block w-80" alt="...">
                                    <p class="pb-20 font-weight-bold">Sudut pajak memiliki menu penjadwalan untuk
                                        mengatur waktu konsultasi</p>
                                </div>

                            </div>
                            <!-- <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button> -->
                        </div>

                    </div>

                </div>
                <div class="row my-3">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <h5 class="fs-6 fw-bold">Mengapa Chat Spesialis disini?</h5>
                        <div class="row mt-4 mb-auto">
                            <div class="col mengapaChatSpesialis">
                                <img src="images/Layanan 1.png" width="50" alt="" class="float-left mr-2">
                                <p class="fw-light">Konsultasikan kebutuhan Pajak Anda dengan Kami
                                    Bicara langsung dengan konsultan kami.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mengapaChatSpesialis">
                                <img src="images/Layanan 2.png" width="50" alt="" class=" float-left mr-2">
                                <p class="fw-light">Sudut Pajak dapat membantu permasalahan perpajakan anda. </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mengapaChatSpesialis">
                                <img src="images/Layanan 3.png" width="50px " alt="" class=" float-left mr-2">
                                <p class="fw-light">Chat spesialis pajak dapat membantu anda untuk memecahkan masalah
                                    perpajakan anda</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>

            </div>

            <div class=" spesialis-chooser col-12 col-sm-7 mt-5 mb-5 ">

                <div class="row">
                    <div class="col-12">
                        <form class="form">
                            <input class="form-control" type="search" placeholder="Cari Spesialis disini"
                                aria-label="Search">
                        </form>
                    </div>
                </div>

                <h3>
                    <?php
                        if (isset($_SESSION['user'])) {
                            echo $_SESSION['user']['nama'];
                        }
                        ?>
                    Selamat Datang di Konsultasi
                </h3>
                <p>Ingin melakukan konsultasi dengan pakar pajak? tekan link dibawah ini</p>
                <a class="btn btn-primary" href="konsultan/registrasi.php" role="button">Chat Konsultasi</a>
                <div class="row">
                    <div class="col-12 mt-10">
                        <h4 class="fs-5 fw-bold mb-1">Rekomendasi Pakar Pajak</h4>
                        <p class="font-weight-light">Konsultasi dengan Pakar Pajak siaga kami</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 border-right">
                        <?php
                            $count = 0;
                            foreach ($query as $q) {
                                if ($count == 2) {
                                    break;
                                }
                            ?>
                        <div class="col-12 col-sm-12 pt-2">

                            <div class="row">
                                <div class="col-sm-6">
                                    <img src="img/konsultan_profil/<?= $q['profil_pic']; ?>" alt="chatIustrasi1"
                                        class="m-0 p-0 border-box " width="200">
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="mb-0"><?= $q['nama']; ?></h6>
                                    <p class="fw-light text-dark mb-0"><?= $q['bidang']; ?></p>
                                    <button type="button" class="btn btn-light btn-sm experienceBtn mb-1 bold"><i
                                            class="fa fa-suitcase"></i> &nbsp;<?= $q['pengalaman']; ?></button>




                                    <br>

                                </div>

                            </div>

                        </div>
                        <hr>
                    </div>

                    <div class="col-sm-6 ">

                        <?php
                                $count++;
                            }
                        ?>
                    </div>
                </div>


                <div class="container" style="position: relative;">
                    <div class="row overflow-auto">
                        <div class="col-sm-12">
                            <div class="category-title">
                                <div class="row">
                                    <div class="col p-0">
                                        <h4 class="fs-5 fw-bold mb-2">Kategori Pakar Pajak</h4>
                                        <p class="">Pilih kategori Pakar Pajak yang sesuai kondisi</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="div category">
                            <div class="row">
                                <div class="col-sm-12 d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="btn text-start" href="{{ route ('konsultanguest2') }}?bidang=1"
                                                role="button">
                                                <img src="img/3_badan.png" alt="" class="float-start">
                                                <h6 class="text-secondary mt-2">PPh badan</h6>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="btn  text-start " href="{{ route ('konsultanguest2') }}?bidang=2"
                                                role="button">
                                                <img src="img/1_tahunanPribadi.png" alt="" class="float-start">
                                                <h6 class="text-secondary mt-2">PPh tahunan <br>orang pribadi</h6>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="btn  text-start" href="{{ route ('konsultanguest2') }}?bidang=3"
                                                role="button">
                                                <img src="img/4_pasal21.png" alt="" class="float-start">
                                                <h6 class="text-secondary mt-2">PPh pasal 21</h6>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="btn ms-2 fs-6 text-start" href="{{ route ('konsultanguest2') }}?bidang=4"
                                                role="button">
                                                <img src="img/2_22dan23.png" alt="" class="float-start">
                                                <h6 class="text-secondary mt-2">PPh pasal 22 dan 23</h6>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="btn ms-2 fs-6 text-start" href="{{ route ('konsultanguest2') }}?bidang=5"
                                                role="button">
                                                <img src="img/5_pasal25.png" alt="" class="float-start">
                                                <h6 class="text-secondary mt-2">PPh pasal 25</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-sm-6 d-flex align-items-center mb-3">

                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- END category -->
                </div>
                <!-- category -->
                <br><br>





            </div>

        </div>
    </div>
</section>
<!-- END konsultasi -->
<br><br><br>
<div>


    <!-- Konsultasi End-->
    <!-- Konsultasi Start-->
    <br><br><br>
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-12">
                <div class="sec-title mb-36">
                    <h2 class="title bg-left ">Cara Menghubungi Spesialis Secara Online?</h2>
                    <p class=" text-justify">Konsultasi dengan pakar pajak secara daring dapat dilakukan dengan mudah.
                        Kami menyediakan konsultasi dengan berbagai permasalah pajak seperti PPh badan, PPh tahunan Orang
                        Pribadi, PPh Pasal 21, PPh Pasal 22 dan PPh Pasal 25. Hanya dengan 3 (tiga) langkah Anda dapat
                        langsung terhubung dengan konsultan spesialis yang anda butuhkan. <span>
                            <ol>
                                <li>Pilih konsultasi spesialis sesuai dengan topik yang Anda butuhkan dikategori spesialis kemudian pilih tombol chat sekarang. Jika user belum mendaftar maka secara otomatis akan diarahkan untuk mendaftar terlebih dahulu dengan mengisi data. </li>
                                <li>Setelah Langkah 1, akan muncul data pribadi spesialis dan ada 3 (tiga) menu untuk melakukan reservasi yaitu, chat, telepon dan zoom. Kemudian pilih sesuai kebutuhan anda dengan mengisi data janji temu online dengan pakar kami. </li>
                                <li>setelah mengisi data janji temu online, maka akan langsung diarahkan ke dashboard user yang berisi jadwal konsultasi yang telah di reservasi sebelumnya dan ada tombol aksi jika user ingin cancel atau reschedule.</li>
                            </ol>
                        </span>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</div>






<!-- The Modal -->
<!-- Button trigger modal -->

<!-- Modal -->




<!-- Footer Start -->
@include('layout.footer')
<!-- Footer End -->



<!-- import modal sign up -->
@include('layout.modal_signUp')

<!--  -->
<!-- All Js -->
<!-- modernizr js -->
<script src="js/modernizr-2.8.3.min.js"></script>
<!-- jquery latest version -->
<script src="js/jquery.min.js"></script>
<!-- counter top js -->
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<!-- wow js -->
<script src="js/wow.min.js"></script>
<!-- rsmenu js -->
<script src="js/rsmenu-main.js"></script>
<!-- plugins js -->
<script src="js/plugins.js"></script>
<!-- Contact js -->
<script src="js/contact.form.js"></script>
<!-- main js -->
<script src="js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    // File JavaScript (modal.js)

    // Inisialisasi modal
    $('#myModal').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });

    // Menampilkan modal
    $('#myModal').on('show.bs.modal', function () {
        console.log('Modal terbuka');
    });

    // Menyembunyikan modal
    $('#myModal').on('hide.bs.modal', function () {
        console.log('Modal tertutup');
    });

</script>

@include('layout.modalLogin')

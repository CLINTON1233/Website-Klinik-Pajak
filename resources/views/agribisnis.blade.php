<?php
include '../public/koneksi.php';

?>

<head>
    <title>Bidang Agribisnis</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
</head>

<?php
    session_start();
    include '../public/connection.php';
    ?>

@include ('layout.navbar4')

    <!-- Breadcrumbs Start -->
    <div class="breadcrumbs">
        <div class="breadcrumbs-wrap">
            <img src="images/bg.jpg" alt="Breadcrumbs Image">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-text">
                        <h1 class="breadcrumbs-title mb-17">Bidang Agribisnis</h1>
                        <div class="categories">
                            <ul>
                                <li><a href="index.php"><i class="fa fa-house"></i>Beranda</a></li>
                                <li>Kategori Perbidang Usaha</li>
                                <li>Bidang Agribisnis</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->
    <!-- Privacy Policy Start -->
    <div id="neuron-privacy" class="neuron-privacy pt-90 pb-90 md-pt-73 md-pb-75">
        <div class="container">
            <div class="privacy-part">
                <div class="single-privacy mb-20">
                    <h2 class="privacy-title semi-bold">Bidang Agribisnis</h2>
                </div>
                <?php
                $query = "SELECT * FROM kategori_usaha";
                $stmt = $conn->query($query);

                // Menggunakan variabel untuk melacak nomor baris
                $rowNumber = 0;

                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $rowNumber++;

                    // Menampilkan deskripsi hanya pada baris kedua
                    if ($rowNumber == 1) {
                        echo "<p>" . $data["deskripsi"] . "</p>";
                    }
                }
                ?>

            </div>
        </div>
        @include('layout.footer')
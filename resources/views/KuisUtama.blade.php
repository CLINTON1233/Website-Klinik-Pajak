<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kuis Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <style>
        .quiz-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .quiz-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 45%;
            margin: 20px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .quiz-content {
            display: flex;
            align-items: center;
        }

        .quiz-logo {
            width: 40px;
            height: 40px;
            margin-right: 15px;
        }

        .quiz-card h3 {
            margin: 0;
            font-size: 18px;
            flex-grow: 1;
        }

        .quiz-card button {
            align-self: flex-end;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .quiz-card button:hover {
            background-color: #45a049;
        }

        .btn {
            background: linear-gradient(41deg, #09c778, #01a0f9);
        }
    </style>
</head>

<body>
    @include('layout.navbar4')

    <!-- Breadcrumbs Start -->
    <div class="breadcrumbs">
        <div class="breadcrumbs-wrap">
            <img src="{{ asset('images/bg.jpg') }}" alt="Breadcrumbs Image">
            <div class="breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-text">
                        <h1 class="breadcrumbs-title mb-17">Kuis Pajak</h1>
                        <div class="categories">
                            <ul>
                                <li><a href="{{ route('beranda') }}"><i class="fa fa-house"></i>Beranda</a></li>
                                <li>Kuis Pajak</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <div id="neuron-privacy" class="neuron-privacy pt-90 pb-90 md-pt-73 md-pb-75">
        <div class="container">
            <div class="privacy-part">
                <div class="single-privacy mb-50">
                    <h2 class="privacy-title semi-bold mb-20 text-center">Kuis Pajak</h2>
                    <p class="privacy-desc margin-0">Kuis Pajak adalah alat atau metode pembelajaran yang dirancang untuk menguji pengetahuan dan pemahaman seseorang tentang peraturan, prinsip, dan ketentuan perpajakan. Biasanya, kuis ini terdiri dari serangkaian pertanyaan yang mencakup berbagai aspek perpajakan, seperti jenis pajak, prosedur pengajuan pajak, perhitungan pajak, hak dan kewajiban wajib pajak, serta perubahan terbaru dalam undang-undang perpajakan.Kuis Pajak membantu peserta untuk lebih memahami konsep-konsep dasar dan kompleks dalam perpajakan.</p>

                    <p class="privacy-desc margin-0">Kuis pajak dirancang untuk menguji dan mengukur pemahaman seseorang tentang berbagai konsep dan peraturan perpajakan. Tujuan utamanya adalah untuk memastikan bahwa individu memiliki pengetahuan yang memadai tentang kewajiban pajak dan cara mengelola pajak dengan benar. Selain itu, kuis ini berfungsi sebagai alat pelatihan dan edukasi, membantu meningkatkan kesadaran dan kepatuhan terhadap peraturan pajak yang berlaku.</p>
                    <p class="privacy-desc margin-0">kuis pajak menjadi instrumen penting dalam memastikan bahwa semua pihak yang terlibat memiliki pemahaman yang baik dan mampu menjalankan tanggung jawab perpajakan dengan efektif.</p>
                </div>
            </div>
            <div class="quiz-container">
                <div class="quiz-card">
                    <div class="quiz-content">
                        <img src="{{ asset('images/kuislogo.png') }}" alt="Logo Kuis" class="quiz-logo">
                        <h3>Kuis PPh 21: Perhitungan PPh 21</h3>
                    </div>
                    <button class="btn text-white"><a href="{{ route('kuispajak') }}" class="text-white">Lihat</a></button>

                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
</body>

</html>
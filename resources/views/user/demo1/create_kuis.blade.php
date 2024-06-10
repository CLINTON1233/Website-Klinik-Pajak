<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Kuis | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .block {
            display: block;
            height: 50px;
            width: 8px;
            margin-right: 5px;
            background: linear-gradient(41deg, #09c778, #01a0f9);
        }

        .fa-plus-circle {
            margin-right: 5px;
            color: white;
        }

        .btn {
            background: linear-gradient(41deg, #09c778, #01a0f9);
        }
    </style>
</head>

<body>
    @include('user.demo1.layout.sidebar')

    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <div class="d-flex align-items-center mb-3">
                        <div class="block"></div>
                        <h4 class="page-title fw-bold">Tambah Kuis</h4>
                    </div>
                </div>
                <div class="card shadow mb-4">
				<div class="card-body">
					<form action="{{ route('kuis.simpan') }}" method="POST"> <!-- Form dimulai di sini -->
						@csrf
						<div class="mb-3">
							<label for="no_kuis" class="form-label fw-bold">No. Kuis</label>
							<input type="number" class="form-control" id="no_kuis" name="no_kuis" placeholder="Nomor Kuis">
						</div>
						<div class="mb-3">
							<label for="judul_kuis" class="form-label fw-bold">Judul</label>
							<input type="text" class="form-control" id="judul_kuis" name="judul_kuis" placeholder="Judul Kuis">
						</div>
						<div class="mb-3">
							<label for="waktu" class="form-label fw-bold">Waktu</label>
							<input type="number" class="form-control" id="waktu" name="waktu" placeholder="Waktu Pengerjaan">
						</div>
						<div class="mb-3">
							<label for="jumlah_soal" class="form-label fw-bold">Jumlah Soal</label>
							<input type="number" class="form-control" id="jumlah_soal" name="jumlah_soal" placeholder="Jumlah Soal Kuis">
						</div>
						<div class="mt-5">
							<button type="submit" class="btn"> <!-- Atribut type="submit" ditambahkan di sini -->
								<i class="fas fa-plus-circle"></i>
								<span class="tambah text-white">Tambah Kuis</span>
							</button>
						</div>
					</form> <!-- Form ditutup di sini -->
				</div>

                </div>
            </div>
        </div>

        @include('user.demo1.layout.footer')
    </div>
</body>

</html>

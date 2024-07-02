<!DOCTYPE html>
<html lang="en">

<head>
    <title>Riwayat Pengerjaan Kuis | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .block {
            display: block;
            height: 50px;
            width: 8px;
            margin-right: 5px;
            background: linear-gradient(41deg, #09c778, #01a0f9);
        }

        .crud-table table thead {
            background: linear-gradient(41deg, #09c778, #01a0f9);
            color: white;
        }

        .table-auto tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .table-auto tbody tr:nth-child(even) {
            background-color: #f3f4f6;
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
                        <h4 class="page-title fw-bold">Riwayat Pengerjaan Kuis</h4>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <!-- Tabel -->
                        <div class="crud-table">
                            <table class="table table-auto">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Waktu Penyelesaian</th>
                                        <th scope="col">Nilai/100.00</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Lihat Evaluasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayatPengerjaan as $riwayat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $riwayat->nama }}</td>
                                        <td>{{ \Carbon\Carbon::parse($riwayat->tanggal)->diffForHumans() }}</td>
                                        <td>{{ $riwayat->skor_akhir }}/100.00</td>
                                        <td>Selesai</td>
                                        <td>
                                            <a href="{{ route('evaluasi_kuis', ['id' => $riwayat->id]) }}" style="color: blue; text-decoration: underline;">Evaluasi</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('user.demo1.layout.footer')
    </div>
</body>

</html>
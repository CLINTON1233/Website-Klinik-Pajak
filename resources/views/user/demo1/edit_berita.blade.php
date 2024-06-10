<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Berita | Sudut Pajak</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    
</head>
<body>
    @include('user.demo1.layout.sidebar')

    <!-- Data Table start -->
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Edit Berita</h4>
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
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input name="judul" value="{{ $article->judul }}" type="text" class="form-control" id="judul" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="isi" class="form-label">Deskripsi</label>
                                        <textarea name="isi" class="form-control" id="isi" rows="3">{{ $article->isi }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cover" class="form-label">Gambar *</label>
                                        <input name="cover" class="form-control" type="file" id="cover" accept="image/*">
                                    </div>
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <div class="input-group mb-3">
                                        <select name="kategori" class="custom-select" id="kategori">
                                            <option selected>Pilih...</option>
                                            <option value="Artikel" {{ $article->kategori == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                                            <option value="Blog" {{ $article->kategori == 'Blog' ? 'selected' : '' }}>Blog</option>
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="kategori">Pilihan</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('user.demo1.layout.footer')

    <script>
        function clicked1() {
            let data = {
                judul: $("#judul").val(),
                isi: $("#isi").val(),
                cover: $("#cover")[0].files,
                kategori: $("#kategori").val(),
            };
            let fd = new FormData();
            fd.append('judul', data.judul);
            fd.append('isi', data.isi);
            fd.append('cover', data.cover[0]);
            fd.append('kategori', data.kategori);
            console.log(fd);

            $.ajax({
                type: "POST",
                processData: false,
                contentType: false,
                cache: false,
                data: fd,
                enctype: 'multipart/form-data',
                url: "{{ route('articles.update', $article->id) }}",
                success: function(res) {
                    if (res.status === 'error') {
                        Swal.fire({
                            title: res.data,
                            icon: 'error',
                            confirmButtonColor: '#008000',
                        });
                        return;
                    }
                    Swal.fire({
                        title: 'Berhasil',
                        icon: 'success',
                        confirmButtonColor: '#008000',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = res.data;
                        }
                    });
                }
            });
        }
    </script>
</body>
</html>

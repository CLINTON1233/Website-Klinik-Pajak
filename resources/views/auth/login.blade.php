<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sudut Pajak</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style2.css') }}">
</head>

<body>
    <div class="container">
        <div class="login">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Login</h1>
                <hr>
                <p>Selamat Datang</p>
                <label for="">Username</label>
                <input type="text" name="username" placeholder="Masukan Username Anda" value="{{ old('username') }}">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Masukan Kata Sandi Anda">
                @if ($errors->has('error'))
                    <p style="background-color: white; color:red">{{ $errors->first('error') }}</p>
                @endif
                <button type="submit">Login</button>
                <p>Belum Punya Akun?</p>
                <p><a href="{{ url('register') }}">Daftar Sekarang</a></p>

            </form>
        </div>
        <div class="right">
            <img src="{{ asset('images/2.png') }}" alt="">
        </div>
    </div>
</body>

</html>

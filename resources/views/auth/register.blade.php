<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Sudut Pajak</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style2.css') }}">
</head>

<body>
    <div class="container">
        <div class="login">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1>Register</h1>
                <hr>
                <p>Selamat Datang</p>
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Masukan Username Anda" value="{{ old('username') }}">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Masukan Kata Sandi Anda">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi Anda">
                @if ($errors->any())
                    <p style="background-color: white; color:red">{{ $errors->first() }}</p>
                @endif
                <button type="submit">Register</button>
                <p>Sudah Punya Akun?</p>
                <p><a href="{{ url('login') }}">Login Sekarang</a></p>
            </form>
        </div>
        <div class="right">
            <img src="{{ asset('images/2.png') }}" alt="">
        </div>
    </div>
</body>

</html>

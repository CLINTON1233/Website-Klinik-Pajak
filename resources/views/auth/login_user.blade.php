<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User | Sudut Pajak</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container my-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="{{ asset('img/profil.png') }}" class="img-fluid" alt="Profile Image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <div class="sec-title">
                    <h5 class="title bg-left">Silahkan login terlebih dahulu</h5>
                </div>
                @if ($errors->has('error'))
                    <p class="text-danger">{{ $errors->first('error') }}</p>
                @endif
                <form action="{{ route('user.login') }}" method="POST">
                    @csrf
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Email address" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                    </div>

                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="remember_me" checked>
                            <label class="form-check-label" for="remember_me">Remember me</label>
                        </div>
                        <a href="#">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Sign in</button>

                    <!-- Divider moved to the center -->
                    <div class="text-center my-4">
                        <div class="divider d-flex align-items-center">
                            <p class="fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div>
                    </div>

                    <a class="btn btn-primary btn-block" href="{{ route('user.register.form') }}" role="button">
                        Register
                    </a>


                    <div class="d-flex justify-content-around align-items-center my-4">
                        <a href="{{ route('login.form') }}">Login as admin</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('frontend/libraries/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('frontend/styles/main.css') }}">

    <title>Login</title>
</head>

<body>

    <!-- main -->
    <main>
        <div class="login-page">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6 col-sm-8">
                        <div class="card card-login align-items-center">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ url('frontend/images/logo_dapur_kenangan.png') }}" class="w-75 mb-4">
                                </div>
                                <form action="{{ url('login') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>

                                    <button type="submit" class="btn btn-login-page btn-block">Sign In</button>

                                    <p class="text-center mt-3">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="lupa-password">Lupa Password</a>
                                        @endif    
                                    </p>
                                </form>
                                <h7 class="mt-4">Don't have account ?</h7><br>
                                <a href="{{ url('/register') }}">register now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="frontend/libraries/jquery/jquery-3.5.1.min.js"></script>
    <script src="frontend/libraries/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
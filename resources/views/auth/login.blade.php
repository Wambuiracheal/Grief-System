@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sing In</title>
    <script src="https://kit.fontawesome.com/0538fc5c28.js" crossorigin="anonymous"></script>
    <style>
/* login.css */

/* Adjust background color if needed */
.card-body {
    background-color: #ffffff; /* Or desired background color */
}

.form-group {
    margin-bottom: 1rem;  /* Adjust spacing as needed */
}

.form-label {
    display: inline-block;
    margin-bottom: .5rem;
    font-weight: bold;
}

.form-control {
    padding: .5rem 1rem;
    font-size: 1rem;
    border: 1px solid #ced4da;  /* Adjust border color */
    border-radius: .25rem;
    transition: border-color .15s ease-in-out;
}

.form-control:focus {
    border-color: #86b7fe;  /* Adjust focus border color */
}

.is-invalid .form-control {
    border-color: #dc3545;  /* Adjust error border color */
}

.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: .25rem;
    font-size: .875rem;
    color: #dc3545;  /* Adjust error message color */
}

.form-check {
    display: block;
    margin-bottom: 1rem;
    line-height: 1.25;
}

.form-check-label {
    margin-bottom: 0;
}

.btn-primary {
    background-color: #1B2F45;  /* Adjust button color */
    border-color: #1B2F45f;
    color: #fff;
    padding: .5rem 1rem;
    font-size: 1rem;
    border-radius: .25rem;
    transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.btn-primary:hover {
    background-color: #0067cc;
    border-color: #0067cc;
}

.btn-link {
    color: #1B2F45;  /* Adjust link color */
    font-weight: normal;
    text-decoration: none;
}

.btn-link:hover {
    color: #0067cc;  /* Adjust link hover color */
    
}

.card-img-top {
    margin-top: 1rem;
    margin-bottom: 1rem;
    height: 8px;
}
.a { 
    color: #ced4da;
}
    </style>
</head>
<body>
    <!DOCTYPE html>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4 mx-auto">
                <div class="card">
                    <img src="import/assets/img/Login.jpeg"  class="card-img-top">
                    <div class="card-header">
                        <h3 class="card-title text-center">Sign In</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                            </div><br>

                        <!-- Register buttons -->
                        <div class="text-center">
                        <p>New User? <a href="register">Create Account</a></p>
                        <p>or sign up with:</p>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-github"></i>
                        </button>
                        </div>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link float-end" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection


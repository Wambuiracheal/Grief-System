@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <style>
        /* register.css */
        
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
            background-color: #072a50;  /* Adjust button color */
            border-color: #007bff;
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
            color: #007bff;  /* Adjust link color */
            font-weight: normal;
            text-decoration: none;
        }
        
        .btn-link:hover {
            color: #0056b3;  /* Adjust link hover color */
            text-decoration: underline;
        }
        
        .card-img-top {
            margin-top: 1rem;
            margin-bottom: 1rem;
            height: 8px;
        }
        
            </style>
</head>
<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-md-6 col-lg-4 mx-auto">
            <div class="card">
              <img src="import/assets/img/Login.jpeg" alt="Background Image" class="card-img-top">
              <div class="card-header">
                <h3 class="card-title text-center">Become One of Us</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
      
                  <div class="row mb-3">
                    <label for="fname" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                    <div class="col-md-8">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="fname" value="{{ old('name') }}" required autocomplete="name" autofocus>
      
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
                    <div class="col-md-8">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="lname" value="{{ old('name') }}" required autocomplete="name" autofocus>
      
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <div class="col-md-8">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                    <div class="col-md-8">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
      
                  <div class="row mb-4">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                    <div class="col-md-8">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
      
                  <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      
</body>
</html>
@endsection

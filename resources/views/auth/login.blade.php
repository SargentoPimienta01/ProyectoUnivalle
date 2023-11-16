@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <meta content="Product Design, Product Management and Webflow Development. I design thoughtful user experiences that piece together a big picture with simple, impactful and shippable solutions focused on the customer" name="description"/>
    <title>Univalle | Menu Inicio</title>
    <link href="{{ Vite::asset('resources/css/styles.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/menu.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/asistente.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
</head>
<style>
        /* Add this CSS to your existing styles.css or create a new CSS file */

/* Global Styles */
body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4; /* Add a light background color */
        }

        .container {
            margin-top: 50px;
        }

        /* Login Card Styles */
        .card {
            border: none; /* Remove the border */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #68091f;
            color: #fff;
            border-bottom: none; /* Remove the border */
            border-radius: 10px 10px 0 0; /* Add border-radius only to the top */
        }

        .card-body {
            padding: 30px; /* Increase padding */
        }

        .form-control {
            margin-bottom: 20px; /* Increase margin */
            border-radius: 5px; /* Add border-radius */
        }

        .btn-primary {
            background-color: #b85474;
            border-color: #b85474;
            border-radius: 5px; /* Add border-radius */
        }

        .btn-primary:hover {
            background-color: #68091f; /* Change hover color */
            border-color: #68091f; /* Change hover color */
        }

        /* Optional: Center the card on the page */
        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Optional: Responsive Design */
        @media (max-width: 768px) {
            .card {
                width: 100%;
            }
        }

    </style>
<!--
<div class="logo-container">
    <img src="{{ Vite::asset('resources/images/Univalle_logo.png') }}" alt="Univalle Logo">
</div>
-->
<div class="hero">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Iniciar sesión') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar sesión') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

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
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'><link rel="stylesheet" href="./style.css">
    <link href="{{ Vite::asset('resources/css/login.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
</head>
<body>   
    <div class="logo-container">
        <img src="{{ Vite::asset('resources/images/Univalle_logo.png') }}" alt="Univalle Logo">
    </div>
<div class="container">
	<div class="screen">
		<div class="screen__content">
            <form class="login" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <label for="email" class="sr-only">{{ __('Correo electrónico') }}</label>
                    <input id="email" type="email" class="login__input @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Correo electrónico">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <label for="password" class="sr-only">{{ __('Contraseña') }}</label>
                    <input id="password" type="password"
                        class="login__input @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password" placeholder="Contraseña">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="button login__submit">
                    <span class="button__text">{{ __('Iniciar sesión') }}</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>

                @if (Route::has('password.request'))
                    <a class="forgot-password-link" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                    @endif
            </form>
			<div class="social-login">
			
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</body>
</html>
@endsection
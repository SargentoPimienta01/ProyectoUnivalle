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
    <link href="{{ Vite::asset('resources/css/login.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
</head>
<!--
<div class="logo-container">
    <img src="{{ Vite::asset('resources/images/Univalle_logo.png') }}" alt="Univalle Logo">
</div>
-->
<div class="hero">
    <div class="container">
      <div class="screen">
        <div class="screen__content">
          <form class="login" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login__field">
              <i class="login__icon fas fa-user"></i>
              <input type="text" class="login__input" name="email" placeholder="Correo electronico">
            </div>
            <div class="login__field">
              <i class="login__icon fas fa-lock"></i>
              <input type="password" class="login__input" name="password" placeholder="Constraseña">
            </div>
            <button type="submit" class="button login__submit">
              <span class="button__text">Ingresar</span>
              <i class="button__icon fas fa-chevron-right"></i>
            </button>
          </form>
          <div class="social-login" style="height: 168px; width: 360px;  ">
            <img src="{{ Vite::asset('resources/images/Univalle_logo.png') }}" alt="Univalle Logo" style="max-width: 40%; height: auto;">
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
  </div>
@endsection

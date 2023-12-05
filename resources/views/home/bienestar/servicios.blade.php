
@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <title>Cajas | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    
</head>
<body>

      <div class="hero">
        <!-- Barra de Navegacion -->
        <!--<nav>
            <a href="{{ url('/home') }}">
            <img src="{{ Vite::asset('resources/img/banner.png') }}" alt="Univalle Logo" class="logo">
            </a>
            <ul>
                <li><a href="{{ url('/home') }}">Menu</a></li>
                <li><a href="{{ url('/home/tramites') }}">Tramites</a></li>
                <li><a href="{{ url('/home/cajas') }}">Cajas</a></li>
                <li><a href="#">Postgrado</a></li>
            </ul>
            <button class="buttonS" type="button"><a href="{{ route('login') }}">Inicio de Sesion</a></button>
        </nav>-->

        <div>
            <h2 style="color: white; text-align: center;">Requisitos de Servicio: {{ $servicioBienestar->servicio }}</h2>
        </div>



        <div class ="contenidopro">

            @foreach ($servicios as $servicio)

            <div class="">
            <div class="card">
                <div class="face front">
                    <img src="{{ Vite::asset('resources/img/tramites/tramite.jpg') }}" alt="Requisitos">
                    <h3>Servicio</h3>
                </div>
                <div class="face back">
                    <h3>Servicio</h3>
                    <p>{{ $servicio->servicio }}</p>
                    
                </div>
            </div>
            </div>
    
            <div class="card">
                <div class="face front">
                    <img src="{{ Vite::asset('resources/img/tramites/duracion.jpeg') }}" alt="Duracion">
                    <h3>Requisitos</h3>
                </div>
                <div class="face back">
                    <h3>Requisitos</h3>
                    <p>{{ $servicio->detalle }}</p>
                </div>
            </div>

            <div class="card">
                <div class="face front">
                    <img src="{{ Vite::asset('resources/img/tramites/duracion.jpeg') }}" alt="Duracion">
                    <h3>Ubicación</h3>
                </div>
                <div class="face back">
                    <h3>Requisitos</h3>
                    <p>{{ $ubicacion->nombre_ubicacion }}</p>
                </div>
            </div>

    
            @endforeach
        </div>
        


        
    </div>  

    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>
</html>

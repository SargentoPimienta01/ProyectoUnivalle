<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <meta content="Product Design, Product Management and Webflow Development. I design thoughtful user experiences that piece together a big picture with simple, impactful and shippable solutions focused on the customer" name="description"/>
    <title>Servicios Dirección | Univalle</title>
    <link href="{{ Vite::asset('resources/css/styles.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/menu.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/tramites/styles_user_tables.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    
</head>
<body>

      <div class="hero">
        <!-- Barra de Navegacion -->
        <nav>
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
        </nav>

        <div>
            <h2 style="color: white; text-align: center;">Servicios de: {{ $servicioDireccion->carrera }}</h2>
        </div>



        <div class="contenidopro">

    @foreach ($servicios as $servicio)

        <div class="card">
            <div class="face front">
                <img src="{{ Vite::asset('resources/img/tramites/tramite.jpg') }}" alt="Requisitos">
                <h3>Servicio</h3>
            </div>
            <div class="face back">
                <h3>Servicio</h3>
                <p>{{ $servicio->Titulo }}</p>
            </div>
        </div>

        <div class="card">
            <div class="face front">
                <img src="{{ Vite::asset('resources/img/tramites/duracion.jpeg') }}" alt="Duracion">
                <h3>Requisitos</h3>
            </div>
            <div class="face back">
                <h3>Requisitos</h3>
                <p>{{ $servicio->Requisitos }}</p>
            </div>
        </div>

        <div class="card">
            <div class="face front">
                <img src="{{ Vite::asset('resources/img/tramites/duracion.jpeg') }}" alt="Duracion">
                <h3>Imagen</h3>
            </div>
            <div class="face back">
                <h3>Requisitos</h3>
                <img src="{{ $servicio->Image }}" alt="Imagen de servicio">
            </div>
        </div>

    @endforeach

</div>


  

    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>
</html>


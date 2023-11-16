<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <meta content="Product Design, Product Management and Webflow Development. I design thoughtful user experiences that piece together a big picture with simple, impactful and shippable solutions focused on the customer" name="description"/>
    <title>Tramites | Univalle</title>
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
            <h2 style="color: white; text-align: center;">Requisitos para el trámite: {{ $nombreTramite }}</h2>
        </div>



        <div class ="contenidopro">

            @foreach ($requisitos as $requisito)

            <div class="">
            <div class="card">
                <div class="face front">
                    <img src="{{ Vite::asset('resources/img/tramites/tramite.jpg') }}" alt="Requisitos">
                    <h3>Requisitos</h3>
                </div>
                <div class="face back">
                    <h3>Requisitos</h3>
                    <p>{{ $requisito->descripcion_requisito }}</p>
                    
                </div>
            </div>
            </div>
    
            <div class="card">
                <div class="face front">
                    <img src="{{ Vite::asset('resources/img/tramites/duracion.jpeg') }}" alt="Duracion">
                    <h3>Duracion</h3>
                </div>
                <div class="face back">
                    <h3>Duracion</h3>
                    <p>{{ $duracionTramite }}</p>
                </div>
            </div>

            <div class="card">
                <div class="face front">
                    <img src="{{ Vite::asset('resources/img/tramites/ubicacion.jpeg') }}" alt="">
                    <h3>Ubicacion</h3>
                </div>
                <div class="face back">
                    <h3>Ubicacion de {{ $ubicacionTramite->nombre }}</h3>
                        <p>
                            Edificio: {{ $ubicacionTramite->edificio }}<br>
                            Planta: @if ($ubicacionTramite->planta == 0)
                                                Planta baja
                                            @else
                                                {{ $ubicacionTramite->planta }}
                                            @endif
                            <br>
                            Horario: {{ $ubicacionTramite->horario }}<br>
                            Horario: {{ $ubicacionTramite->detalles_direccion }}<br>
                            <!-- Agrega más campos según sea necesario -->
                        </p>
                </div>
            </div>
    
            @endforeach
        </div>
        


        
    </div>  

    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>
</html>
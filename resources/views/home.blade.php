<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <meta content="Product Design, Product Management and Webflow Development. I design thoughtful user experiences that piece together a big picture with simple, impactful and shippable solutions focused on the customer" name="description"/>
    <title>Univalle | Menu Inicio</title>
    <link href="{{ Vite::asset('resources/css/styles.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/menu.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/Univalle_logo.png') }}">
</head>
<body>
    <div class="intro">
        <h1> Univalle
            <!-- <span class="logo-parts">
                Univalle
            </span> -->
        </h1> 
    </div>
  
        
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
                    <li><a href="#">Postgrdo</a></li>
                </ul>
                <button type="button"><a href="{{ route('login') }}">Inicio de Sesion</a></button>
            </nav>

            <div class="Opciones">  
            @foreach($areas as $area)
                <div class="lefter">
                    @php
                        $nombre_area_slug = Str::slug($area->nombre_area, '-');
                    @endphp
                    <a class="link" href="{{ route('nombre_area', ['nombre_area' => $nombre_area_slug]) }}">
                        <div class="boton">{{ $area->nombre_area }}</div>
                        <div class="boton_bg-grad"></div>
                    </a>
                </div>
            @endforeach 
            </div>
        </div>

    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>
</html>

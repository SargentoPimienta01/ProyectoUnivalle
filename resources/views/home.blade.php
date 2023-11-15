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
    <link href="{{ Vite::asset('resources/css/asistente.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
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
                    <li><a href="#">Postgrado</a></li>
                </ul>
                @if(auth()->check())
                    @if(!auth()->user()->hasRole('Usuario'))
                        <button class="buttonS" type="button"><a href="{{ route('admin') }}">Ir al Admin </a></button>
                    @else
                        <button class="buttonS" type="button"><a href="{{ route('home') }}">Home  </a></button>
                    @endif
                @else
                    <button class="buttonS" type="button"><a href="{{ route('login') }}">Inicio de Sesión</a></button>
                @endif




            </nav>

            <div class="Opciones">  
            @foreach($areas as $area)
                <div>
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

        
        <div id="person-container">
 
            <img id="person" class="person-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_JdYlVpWfBP468NtwMoaWp7itjbhXr8NtFYoaWBMfQY4pH4iPWBa4zNuq7bNU3LkqFR4&usqp=CAU" alt="Person Icon">
            <div id="bubble">
                <p id="text"></p>
            </div>
        </div>

        

<!--<script src="https://www.gptbots.ai/widget/etgwhmakueebcpvaorlick8/chat.js" async></script>-->
  
  
    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/asistenteHome.js') }}"></script>
</body>
</html>

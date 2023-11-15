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
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/css/styles.css') }}">
    
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
            <h2 style="color: white; text-align: center;">{{ $ctramite->nombre_categoria }}</h2>
        </div>

        <div class="Opciones2">
            @foreach($tramites as $tramite)
                    
            <form method="POST" action="{{ route('requisitos') }}">
                @csrf
                <input type="hidden" name="id_tramite" value="{{ $tramite->Id_tramite }}">
                <input type="hidden" name="nombre_tramite" value="{{ $tramite->nombre_tramite }}">
                <input type="hidden" name="duracion_tramite" value="{{ $tramite->duracion_tramite }}">
                <!-- Puedes incluir otros campos o información adicional si es necesario -->
                <button type="submit" class="button-anon-pen"><span>{{ $tramite->nombre_tramite }}</span></button>
            </form>   
                
            @endforeach

        </div>
        


    </div>
    
        
      <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
      

</body>
</html>
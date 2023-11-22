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
    <link href="{{ Vite::asset('resources/css/tramites.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/css/styles.css') }}">
    <style>
        .Opciones2 {
            width: 200%; 
        }
        .button-anon-pen {
            width: 480px; 
            height: 150px;
           
        }
    </style> 
</head>
<body>

    <div class="hero">
        <!-- Barra de Navegacion -->
        <nav>
            <a href="{{ url('/home') }}">
            <img src="{{ Vite::asset('resources/img/banner.png') }}" alt="Univalle Logo" class="logo">
            </a>
            
            <button class="buttonS" type="button"><a href="{{ route('login') }}">Inicio de Sesion</a></button>
        </nav>

        <div>
            <h2 style="color: white; text-align: center;">{{ $ctramite->nombre_categoria }}</h2>
        </div>

        <div class="Opciones2">
    @foreach($tramites as $tramite)
        <form method="GET" action="{{ route('requisitos', ['id_categoria_tramites' => $ctramite->id_categoria_tramites, 'nombre_categoria' => Str::slug($ctramite->nombre_categoria), 'id_tramite' => $tramite->Id_tramite, 'nombre_tramite' => Str::slug($tramite->nombre_tramite)]) }}">
            <button type="submit" class="button-anon-pen"><span>{{ $tramite->nombre_tramite }}</span></button>
        </form>   
    @endforeach
</div>

        


    </div>
    
        
      <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
      

</body>
</html>
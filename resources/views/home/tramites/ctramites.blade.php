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
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-brand">
            <a href="{{ route('home') }}">
                <img src="{{ Vite::asset('resources/img/UnivalleLogo.png') }}" alt="Univalle Logo" height="70">
            </a>
           
            <button class="buttonS" type="button"><a href="{{ route('login') }}">Inicio de Sesion</a></button>
        </nav>

        <div>
            <h2 style="color: white; text-align: center;">Tipos de tramites</h2>
        </div>
    </nav>
    <h1 class="text-center mt-3" style="color: #630505;">Tipos de trámites</h1>
    <div class="container-fluid">
        <div class="row">
            @foreach($ctramites as $ctramite)
                <a href="{{ route('tramitesdisponibles', ['id_categoria_tramites' => $ctramite->id_categoria_tramites, 'nombre_categoria' => Str::slug($ctramite->nombre_categoria)]) }}" class="button-anon-pen">
                    <span>{{ $ctramite->nombre_categoria }}</span>
                </a>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
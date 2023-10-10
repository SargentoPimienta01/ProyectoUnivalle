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
    <link href="{{ Vite::asset('resources/css/tramites/styles_user_tables.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/css/styles.css') }}">
    
</head>
<body>
  
    <div class="titulo">
        <h2>{{ $ctramite->nombre_categoria }}</h2>
    </div>

    <aside>
        <nav>
        <ul>
            @foreach($tramites as $tramite)
                <li>
                    <form method="POST" action="{{ route('requisitos') }}">
                        @csrf
                        <input type="hidden" name="id_tramite" value="{{ $tramite->Id_tramite }}">
                        <input type="hidden" name="nombre_tramite" value="{{ $tramite->nombre_tramite }}">
                        <!-- Puedes incluir otros campos o información adicional si es necesario -->
                        <button type="submit" class="custom-button">{{ $tramite->nombre_tramite }}</button>
                    </form>
                </li>
            @endforeach
        </ul>
        </nav>
      </aside>
      

</body>
</html>
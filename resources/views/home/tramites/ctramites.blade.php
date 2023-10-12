@extends('layouts.indexbutton')

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
      <h2>Tramites</h2>
    </div>
      
      <aside>
        <nav>
        <ul>
            @foreach($ctramites as $ctramite)
                <li>
                    <form method="POST" action="{{ route('tramitesdisponibles') }}">
                        @csrf
                        <input type="hidden" name="id_categoria_tramites" value="{{ $ctramite->id_categoria_tramites }}"> <!-- Puedes cambiar el valor según tus necesidades -->
                        <!-- Resto de los campos del formulario -->
                        <button type="submit" class="custom-button">{{ $ctramite->nombre_categoria }}</button>
                    </form>
                </li>
            @endforeach
        </ul>
        </nav>
      </aside>
        
</body>
</html>

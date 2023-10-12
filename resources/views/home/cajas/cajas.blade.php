@extends('layouts.indexbutton')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <meta content="Product Design, Product Management and Webflow Development. I design thoughtful user experiences that piece together a big picture with simple, impactful and shippable solutions focused on the customer" name="description"/>
    <title>Cajas | Univalle</title>
    <link href="{{ Vite::asset('resources/css/styles.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/tramites/styles_user_tables.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/css/styles.css') }}">
</head>
<body>
  
    <div class="titulo">
        <h2>Cajas</h2>
    </div>
      
    <aside>
        <nav>
            <ul>
                @foreach($cajas as $caja)
                    <li>
                        <form method="POST" action="{{ route('requisitosCaja') }}">
                            @csrf
                            <input type="hidden" name="id_caja" value="{{ $caja->Id_caja }}">
                            <!-- Agrega el resto de los campos del formulario si es necesario -->
                            <button type="submit" class="custom-button">{{ $caja->nombre_caja }}</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </nav>
    </aside>
        
</body>
</html>

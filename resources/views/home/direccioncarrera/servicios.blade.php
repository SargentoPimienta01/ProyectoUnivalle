@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <title>Tramites | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            overflow: hidden;  
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px; 
            transition: transform 0.3s ease-in-out; 
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
            margin-bottom: 20px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 40px;
            text-align: left; 
        }

        .card-title {
            font-size: 18px; 
            margin-bottom: 10px; 
        }

        .card-text {
            font-size: 14px; 
            line-height: 1.5;
            white-space: pre-line;
        }

        .btn-custom {
            background-color: rgb(90, 18, 18);
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-custom:hover {
            background-color: #631212;
            color: white;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

    </style>
</head>
<body>

    <div class="hero">
        
            <h1 style="color: #630505;">Servicios de: {{ $servicioDireccion->carrera }}</h1>
        
    
        <div class="contenidopro">
            @foreach ($servicios as $servicio)
                <div class="card bg-white border-0 rounded-3 mb-3">
                    <div class="card-body text-center">
                        <img src="{{ Vite::asset('resources/img/tramites/tramite.jpg') }}" alt="Requisitos" class="img-fluid">
                        <h3 class="mt-3">Servicio</h3>
                        <p>{{ $servicio->Titulo }}</p>
                    </div>
                </div>
    
                <div class="card bg-white border-0 rounded-3 mb-3">
                    <div class="card-body text-center">
                        <img src="{{ Vite::asset('resources/img/tramites/duracion.jpeg') }}" alt="Duracion" class="img-fluid">
                        <h3 class="mt-3">Requisitos</h3>
                        <p>{{ $servicio->Requisitos }}</p>
                    </div>
                </div>
    
                <div class="card bg-white border-0 rounded-3 mb-3">
                    <div class="card-body text-center">
                        <img src="{{ Vite::asset('resources/img/tramites/duracion.jpeg') }}" alt="Duracion" class="img-fluid">
                        <h3 class="mt-3">Imagen</h3>
                        <img src="{{ $servicio->Image }}" alt="Imagen de servicio" class="img-fluid">
                    </div>
                </div>
    
                <div class="card bg-white border-0 rounded-3 mb-3">
                    <div class="card-body text-center">
                        <img src="{{ Vite::asset('resources/img/tramites/duracion.jpeg') }}" alt="Duracion" class="img-fluid">
                        <h3 class="mt-3">Ubicación</h3>
                        <p>{{ $ubicacion->nombre_ubicacion }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>
</html>

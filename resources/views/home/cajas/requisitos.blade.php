@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <title>Cajas | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body{
            overflow: hidden;  
        }
        .card {
            height: 100%;
            border: 1px solid #ddd;
            border-radius: 8px; 
            transition: transform 0.3s ease-in-out; 
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
            margin-bottom: 20px;
            
        }

        .card.zoom-effect:hover {
            transform: scale(1.01); 
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

        .card-text {
            white-space: pre-line;
        }

    </style>
</head>
<body>

    <div class="hero">
            <h1 class="text-center mt-3" style="color: #630505;">Requisitos para la caja: {{ $requisitoCaja->nombre_caja }}</h1>
        <div class="contenidopro row">
            @foreach ($requisitos as $requisito)
            <div class="col-md-4s mb-3">
                <div class="card zoom-effect">
                    <div class="card-body animated-hover">
                        <h5 class="card-title">Servicio</h5>
                        <p class="card-text">{{ $requisito->nombre_requisito }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4s mb-3">
                <div class="card zoom-effect">
                    <div class="card-body animated-hover">
                        <h5 class="card-title">Requisitos</h5>
                        <p class="card-text">{!! nl2br($requisito->descripcion_requisito) !!}</p>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>
</html>


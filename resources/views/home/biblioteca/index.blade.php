@extends('layout.barra')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <title>Biblioteca | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #EAE8E9ff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            padding-top: 20px;
            text-align: center;
            color: #6e1010;
            font-size: 2em;
            transition: color 0.3s ease-in-out;
            margin-bottom: 20px;
        }

        h1:hover {
            color: #68091Fff;
        }

        .container {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .column {
            flex: 1;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin-bottom: 20px;
        }

        .column-heading {
            font-size: 1.5em;
            font-weight: bold;
            text-align: center;
            color: #6e1010;
        }

        .highlight {
            color: #68091Fff;
        }

        .card {
            width: 100%;
            height: 80%;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
            border-radius: 8px; 
            padding: 15px;
            margin: 10px 10px;
            transition: transform 0.3s ease-in-out; 
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .card:hover {
            transform: scale(1.01);
        }

        .card img {
            width: 30%;
            border-radius: 8px 0 0 8px;
            margin: 0 auto;
        }

        .card-body {
            padding: 0; 
            width: 70%;
        }

        @media (max-width: 768px) {
            .column {
                flex: 1;
                width: 100%;
            }
            .card {
                flex-direction: column;
                height: auto;
            }
            .card img {
                width: 100%;
                border-radius: 8px 8px 0 0;
            }
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1>Biblioteca</h1>
        <div class="container">
            <div >
                <div class="column-heading">ANUNCIOS</div>
                @foreach($bibliotecas as $biblioteca)
                    @if($biblioteca->categoria == 'Anuncio')
                        <div class="card">
                            <img src="{{ $biblioteca->foto }}" alt="Imagen" />
                            <div class="card-body">
                                <p><strong>{{ $biblioteca->titulo }}</strong></p>
                                <p>{{ $biblioteca->descripcion }}</p>
                                <p>Fecha: {{ $biblioteca->fecha }}</p>
                                <p>Hora: {{ $biblioteca->hora }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div >
                <div class="column-heading highlight">EVENTOS</div>
                @foreach($bibliotecas as $biblioteca)
                    @if($biblioteca->categoria == 'Evento')
                        <div class="card">
                            <img src="{{ $biblioteca->foto }}" alt="Imagen" />
                            <div class="card-body">
                                <p><strong>{{ $biblioteca->titulo }}</strong></p>
                                <p>{{ $biblioteca->descripcion }}</p>
                                <p>Fecha: {{ $biblioteca->fecha }}</p>
                                <p>Hora: {{ $biblioteca->hora }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        {{ $bibliotecas->links('vendor.pagination.custom') }}
    </div>
</body>
</html>

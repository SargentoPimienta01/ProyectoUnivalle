@extends('layout.barra')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <title>Postgrado | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Univalle</title>

    <style>
        .cuadroInformativo {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin: 20px 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            background-color: #fff;
            height: 0;
            padding-bottom: 100%; 
            position: relative;
        }

        .cuadroInformativo:hover {
            transform: scale(1.05);
        }

        .contenido {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 20px;
        }

        .tituloInf {
            margin-bottom: 10px;
        }

        .parrafoInf {
            font-size: 16px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="container"> 
            <div class="row">
                @foreach($posgrados as $posgrado)
                <div class="col-md-4"> 
                    <div class="cuadroInformativo">
                        <div class="contenido">
                            <div class="tituloInf">
                                <h3>{{ $posgrado->nombre_programa }}</h3>
                                <br>
                            </div>
                            <div class="parrafoInf">
                                <b>Descripción:</b>
                                <br>
                                <p>{{ $posgrado->descripcion }}</p>
                                <ul>
                                    <li>Modalidad: {{ $posgrado->modalidad }}</li>
                                    <li>Categoría: {{ $posgrado->categoria }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>

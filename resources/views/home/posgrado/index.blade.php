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

        #servicios-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .toggle-button {
            color: black;
            text-decoration: none;
            display: inline-block;
            padding: 15px 20px;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 14px;
            margin: 10px auto;
        }

            .card,
            .service-card,
            .image-card {
                margin: 10px;
                padding: 10px;
                text-align: center;
                background: var(--transparent-white);
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
                transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out;
            }

            .image-card img {
                width: 100%;
                height: auto;
                max-width: 300px;
                max-height: 200px;
            }

            .service-card {
                width: calc(100% - 20px);
                display: none;
            }

            .service-card.active {
                display: block;
                opacity: 1;
                height: auto;
            }

            .service-card:hover,
            .image-card:hover {
                opacity: 1;
                transform: scale(1.1);
            }

            button {
                background-color: #333;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            #servicios h3 {
                color: rgb(0, 0, 0);
            }

            @media (min-width: 768px) {
                .service-card {
                    width: calc(50% - 20px);
                }
            }

            @media (min-width: 992px) {
                .service-card {
                    width: calc(33.33% - 20px);
                }
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
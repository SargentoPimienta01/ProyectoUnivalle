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
        body {
          /*  overflow: hidden;*/
            background-color: #f8f9fa;
        }

        .hero {
            padding: 20px;
        }

        .card {
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
            padding: 10px;
            text-align: left; 
        }

        .card-title {
            font-size: 18px; 
            margin-bottom: 10px; 
        }

        .card-text {
            font-size: 14px; 
            line-height: 1.3;
            
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

    </style>
</head>

<body>
    <h1 class="text-center mt-3" style="color: #630505;">NAF</h1>
    <div class="contenidopro row">
            @foreach($nafs as $naf)
                <div class="col-md-4s mb-3">
                    <div class="card zoom-effect">
                        <div class="card-body animated-hover">
                            <h3 class="card-title">{{ strtoupper($naf->nombre_naf) }}</h3>
                            <div class="parrafoInf">
                                <ul>
                                    @php
                                        if ($naf->descripcion !== null) {
                                            $lineas = explode("\n", $naf->descripcion);
                                            foreach ($lineas as $linea) {
                                                $elementos = explode(',', $linea);
                                                foreach ($elementos as $elemento) {
                                                    echo '<li>' . trim($elemento) . '</li>';
                                                }
                                            }
                                        }
                                    @endphp
                                </ul>
                            </div>

                            @foreach($requisitosNaf as $requisitoNaf)
                                @if($requisitoNaf->Id_naf == $naf->Id_naf)
                                    <div class="subTitulo">
                                        <p>Requisitos - {{ $requisitoNaf->nombre_requisito }}</p>
                                    </div>
                                    <div class="parrafoInf">
                                        <ul>
                                            @php
                                                $lineas = explode("\n", $requisitoNaf->descripcion_requisito);
                                                foreach ($lineas as $linea) {
                                                    $elementos = explode(',', $linea);
                                                    foreach ($elementos as $elemento) {
                                                        echo '<li>' . trim($elemento) . '</li>';
                                                    }
                                                }
                                            @endphp
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        
    </div>
</body>

</html>

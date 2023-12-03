@extends('layouts.backspace')
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
        height: 100vh;
        }

        h1 {
        text-align: center;
        color: #9E0442ff;
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
        width: 80%;
        margin-top: 20px;
        }

        .column {
        flex: 0 0 auto;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        }

        .item {
        width: 400px;
        height: 250px;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid rgb(87, 3, 0);
        padding: 5px;
        text-align: center;
        border-radius: 25px;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
        margin: 20px 10px;
        }

        .item:hover {
        transform: scale(1.05);
        }

        .item::before {
        content: "";
        display: block;
        padding-top: 100%;
        }

        .item-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        height: 90%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        }

        .item-content img {
        width: 30%;
        margin-right: 20px;
        border-radius: 50%;
        }

        .item-content p {
        margin: 0;
        }

        .column-heading {
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 10px;
        }
  </style>
</head>
<body>

  <h1>Biblioteca</h1>
  <div class="container">
    <div class="column">
        <div class="column-heading">ANUNCIOS</div>
        @foreach($bibliotecas as $biblioteca)
            @if($biblioteca->categoria == 'Anuncio')
                <div class="item">
                    <div class="item-content">
                        <img src="{{ $biblioteca->foto }}" alt="Imagen" />
                        <div>
                            <p><strong>{{ $biblioteca->titulo }}</strong></p>
                            <p>{{ $biblioteca->descripcion }}</p>
                            <p>Fecha: {{ $biblioteca->fecha }}</p>
                            <p>Hora: {{ $biblioteca->hora }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="column">
        <div class="column-heading">EVENTOS</div>
        @foreach($bibliotecas as $biblioteca)
            @if($biblioteca->categoria == 'Evento')
                <div class="item">
                    <div class="item-content">
                        <img src="{{ $biblioteca->foto }}" alt="Imagen" />
                        <div>
                            <p><strong>{{ $biblioteca->titulo }}</strong></p>
                            <p>{{ $biblioteca->descripcion }}</p>
                            <p>Fecha: {{ $biblioteca->fecha }}</p>
                            <p>Hora: {{ $biblioteca->hora }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
{{ $bibliotecas->links('vendor.pagination.custom') }}

</body>
</html>

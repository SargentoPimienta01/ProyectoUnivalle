@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Univalle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <style>

        .container-fluid {
            margin-top: 20px; 
        }

        .row:first-child {
            margin-bottom: 20px;  
        }

        .card {
            margin-bottom: 20px;
            height: 210px;
            width: 210px;
            display: absolute;
            flex-direction: column;
            justify-content: space-between;
            background: var(--transparent-white);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
            transition: transform 1s ease, box-shadow 1s ease;      
        }
        
        .card:hover {
        transform: scale(1.05); 
        box-shadow: 0 6px 13px rgba(128, 9, 9, 0.945); 
        }

        .card-title {
            color: var(--amaranth-purple);
        border: none; 
        margin: 0; 
        padding: 0; 
        background: none; 
        padding-bottom: 15px;
        cursor: pointer;
        font-weight: bold;
        }

        .card-box {
        padding: 20px;
        height: 160px; 
        text-align: center; 
        }

        .card img {
            display: none;
        }

        .card-body {
            text-align: center;
        }

    
    </style>
</head>

<body>
    <!--<nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-brand">
            <a href="{{ route('home') }}">
                <img src="{{ Vite::asset('resources/img/UnivalleLogo.png') }}" alt="Univalle Logo" height="70">
            </a>
            <span class="univalle-text">UNIVALLE</span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>-->
        <!--<div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tramites-inicio') }}">Tramites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cajas') }}">Cajas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{  route('naf') }}">Naf</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bienestar-universitario') }}">Bienestar universitario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('biblioteca') }}">Biblioteca</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posgrado') }}">Postgrado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cafeteria') }}">Cafeteria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('direccion-de-carrera') }}">Direccion de carrera</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('campus') }}">Campus</a>
                </li>
            </ul>
        </div>-->
    <!--</nav>-->
    <h1 class="text-center mt-3" style="color: #630505;">Tipos de trámites</h1>
    <div class="container-fluid">
        <div class="row">
            @foreach($tramites as $tramite)
            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Card Image">
                    <div class="card-body card-box">

                         <button type="submit" class="card-title"><span class="card-title">{{ $tramite->nombre_tramite }}</span></button>
                   
                    <a href="{{ route('requisitos', ['id_categoria_tramites' => $ctramite->id_categoria_tramites, 'nombre_categoria' => Str::slug($ctramite->nombre_categoria), 'id_tramite' => $tramite->Id_tramite, 'nombre_tramite' => Str::slug($tramite->nombre_tramite)]) }}" style="color: black; text-decoration: none; display: inline-block; padding: 15px 20px; background-color: #eee; border: 1px solid #ccc; border-radius: 5px; transition: background-color 0.3s; padding: 15px 20px;  ">
                        Ver Trámites
                    </a>
                  
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
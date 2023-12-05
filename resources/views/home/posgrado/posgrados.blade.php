@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Tus metadatos y enlaces a CSS y Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    <style>
        body {
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
            padding-bottom: 13px;
            white-space: pre-line;
        }

        .card-link {
            color: black; 
            text-decoration: none; 
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="header text-center">
            <h1 class="text-center mt-5" style="color: #630505;">POSTGRADO</h1>
        </div>

        <div class="info-box mt-4">
            <p>En Postgrado Univalle contarás con un amplio portafolio de Programas enfocados a satisfacer tus necesidades académicas actuales. La calidad de nuestros programas está sustentada en la experiencia académica de los profesores, combinada con su desempeño en el mundo laboral actual.</p>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <a href="{{ route('posgrado.doctorado') }}" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Doctorados</h3>
                            <p class="card-text">El grado de Doctor se confiere al doctorando que ha obtenido un grado de Magister en la respectiva disciplina...</p>
                            <a href="{{ route('posgrado.doctorado') }}" class="btn btn-outline-secondary btn-custom">Ver más detalles</a>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('posgrado.maestria') }}" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Maestrías</h3>
                            <p class="card-text">Los Programas de Maestría brindan conocimientos, destrezas y habilidades en diferentes campos y disciplinas científicos...</p>
                            <a href="{{ route('posgrado.maestria') }}" class="btn btn-outline-secondary btn-custom">Ver más detalles</a>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('posgrado.diplomado') }}" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Diplomados</h3>
                            <p class="card-text">Los Programas de Maestría brindan conocimientos, destrezas y habilidades en diferentes campos y disciplinas científicos...</p>
                            <a href="{{ route('posgrado.diplomado') }}" class="btn btn-outline-secondary btn-custom">Ver más detalles</a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

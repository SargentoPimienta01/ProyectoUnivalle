<!DOCTYPE html>
<html lang="en">

<head>
    <title>Requisitos de Cajas PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .logo {
            max-width: 100px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
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
            white-space: pre-line;
        }

        .contenidopro {
            margin-top: 20px;
        }

        .hero {
            border: 1px solid #ddd;
            padding: 20px;
        }
    </style>
</head>

<body>
    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Univalle_bol_cbb_logo.png" alt="Logo" class="logo">
    <h1>Requisitos para la caja: {{ $requisitoCaja->nombre_caja }}</h1>

    <div class="hero">
        <div class="contenidopro">
            @foreach ($requisitos as $requisito)
                <div class="card zoom-effect">
                    <div class="card-body animated-hover">
                        <h5 class="card-title">Servicio</h5>
                        <p class="card-text">{{ $requisito->nombre_requisito }}</p>
                    </div>
                </div>

                <div class="card zoom-effect">
                    <div class="card-body animated-hover">
                        <h5 class="card-title">Requisitos</h5>
                        <p class="card-text">{!! nl2br($requisito->descripcion_requisito) !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>

</html>

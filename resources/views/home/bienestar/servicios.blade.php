@extends('layout.barra')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <title>Bienestar Universitario | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/asistente_real.css') }}">

    <style>
        body {
           /* overflow: hidden;  */
        }

        .hero {
            padding: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px; 
            width: 100%;
            transition: transform 0.3s ease-in-out; 
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
            margin-bottom: 20px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 20px;
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

        .service-group {
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .service-group h3 {
            font-size: 24px;
            color: #630505;
            margin-top: 20px;
        }

        .service-title {
            font-size: 24px;
            color: #fff;
            background-color: #630505;
            padding: 10px 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .service-title::after {
            font-size: 18px;
            margin-left: 10px;
        }

        @media (min-width: 768px) {
            .service-group {
                flex-direction: row;
            }

            .card {
                width: 30%;
                margin: 0 10px;
            }
        }
    </style>
</head>

<body>
    <div class="hero">
        <div style="color: #8B0000; text-align: center; margin-top: 20px; margin-bottom: 40px;">
            <h2>Requisitos de Servicio {{ $servicioBienestar->servicio }}</h2>
        </div>
        
        <div id="person-container">
            <img id="person" class="person-image"  src="{{ Vite::asset('resources/images/asistente.png') }}" alt="Person Icon">
            <div id="bubble">
                <p id="text"></p>
            </div>
        </div>
        <h1 style="color: #630505;">Servicios de la carrera {{ $servicioBienestar->carrera }}</h1>
        <div class="contenidopro">
            @php $serviceCounter = 1; @endphp 
            @foreach ($servicios as $servicio)
            <div class="card">
                <div class="face front">
                    <img src="{{ Vite::asset('resources/img/tramites/tramite.jpg') }}" alt="Requisitos" class="img-fluid">
                    
                </div>
                <div class="face back">
                    <h3>Servicio</h3>
                    <p>{{ $servicio->servicio }}</p>
                </div>
            </div>

            <div class="card">
                <div class="face front">
                    <img src="{{ Vite::asset('resources/img/tramites/duracion.jpeg') }}" alt="Duracion" class="img-fluid">
                    
                </div>
                <div class="face back">
                    <h3>Requisitos</h3>
                    <p>{{ $servicio->detalle }}</p>
                </div>
            </div>

            <div class="card">
                <div class="face front">
                    <img src="https://i.ibb.co/C6gF0vC/Bienestar-Universitario.jpg" alt="Duracion" class="img-fluid">
                            <h3 class="mt-3">Ubicación</h3>
                            <p>{{ $ubicacion->nombre_ubicacion }}</p>
                        </div>
                    </div>
                 
                </div>
               
                @php $serviceCounter++; @endphp 
            @endforeach
        </div>
    </div>
    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
    <script>
        const textArray = [
            "Aqui podras encontrar los requisitos de cada servicio",
            "tambien la unicacion de cada gabinete",
           
        ];
        let textIndex = 0;
        const textElement = document.getElementById('text');
        const bubble = document.getElementById('bubble');
        const personImage = document.getElementById('person');
    
        function showText() {
            if (textIndex < textArray.length) {
                textElement.textContent = textArray[textIndex];
                textIndex++;
                bubble.style.visibility = 'visible';
                bubble.style.opacity = '1';
                setTimeout(() => {
                    showText();
                }, 3000);
            } else {
                hideText();
            }
        }
    
        function hideText() {
            bubble.style.opacity = '0';
            setTimeout(() => {
                bubble.style.visibility = 'hidden';
                fadeOut(personImage, 2000);
            }, 500);
        }
    
        function fadeOut(element, duration) {
            let opacity = 1;
            const interval = 50;
    
            const fadeOutInterval = setInterval(() => {
                if (opacity > 0) {
                    opacity -= interval / duration;
                    element.style.opacity = opacity;
                } else {
                    clearInterval(fadeOutInterval);
                    element.style.display = 'none';
                }
            }, interval);
        }
    
        showText();
    
        personImage.addEventListener('click', () => {
            textIndex = 0;
            personImage.style.opacity = '1';
            personImage.style.display = 'block';
            showText();
        });
    </script>
</body>

</html>
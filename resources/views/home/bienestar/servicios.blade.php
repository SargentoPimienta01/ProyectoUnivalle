@extends('layout.barra')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card" />
    <meta property="og:type" content="website" />
    <title>Cajas | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/asistente_real.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .contenidopro {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            width: 300px;
            height: 100%;
            padding: 10PX;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            margin-right: 10px; /* Add margin here */
        }

        .card:hover {
            transform: scale(1.01);
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
            margin-top: auto;
        }

        .btn-custom:hover {
            background-color: #631212;
            color: white;
        }

        .contact-info {
            margin-top: auto;
        }

        .contact-link {
            color: inherit;
            text-decoration: underline;
        }

        .modal-content {
            height: 90vh;
        }

        .modal-body {
            max-height: 80vh;
            overflow-y: auto;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
            transform: scale(0.9);
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
        <div class="contenidopro">
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
                    <img src="{{ Vite::asset('resources/img/tramites/duracion.jpeg') }}" alt="Duracion" class="img-fluid">
                    
                </div>
                <div class="face back">
                    <h3>Ubicación</h3>
                    <p>{{ $ubicacion->nombre_ubicacion }}</p>
                </div>
            </div>
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

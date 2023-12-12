@extends('layout.barra')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Direccion de Carrera | Univalle</title>
        <link rel="stylesheet" href="{{ Vite::asset('resources/css/asistente_real.css') }}">
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
    <div class="hero">
            <h1 class="text-center mt-3" style="color: #630505;">Direcciones de carrera</h1>
            <div id="person-container">
                <img id="person" class="person-image"  src="{{ Vite::asset('resources/images/asistente.png') }}" alt="Person Icon">
                <div id="bubble">
                    <p id="text"></p>
                </div>
            </div>
        <div class="Opciones2">
            <div class="container-fluid">
                <div class="row">
                    @foreach($direcciones as $direccion)
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <div class="card">
                                <div class="card-body card-box">
                                    <h5 class="card-title" >
                                        {{ $direccion->carrera }}
                                    </h5>
                                    <a href="{{ route('serviciosDireccion', ['id_direccion' => $direccion->id, 'servicio' => Str::slug($direccion->carrera)]) }}" style="color: black; text-decoration: none; display: inline-block; padding: 15px 20px; background-color: #eee; border: 1px solid #ccc; border-radius: 5px; transition: background-color 0.3s;">
                                        Ver Servicios
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    
    </div>
      <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
      <script>
        const textArray = [
            "¡Bienvenid@ al Area de direcciones de carrera",
            "Aquí encontrarás información sobre diferentes carreras",
           
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

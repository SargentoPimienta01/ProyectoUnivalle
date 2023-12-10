@extends('layout.barra')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria Menu</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/asistente_real.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body {
            padding-top: 5rem;
            padding-bottom: 10px;
            margin: 20px;
        }

        .menu-category {
            margin-bottom: 20px;
        }

        .category-header h2 {
            color: #630505;
            text-align: center;
            margin-bottom: 10px;
        }

        .card {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            padding-top: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .menu-item img {
            width: 50%;
            height: 100%;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .menu-item-description {
            padding: 15px;
        }

        .menu-item-price {
            font-weight: bold;
        }
    </style>
</head>

<body class="container-fluid">
    <div class="hero">
    <h1 class="text-center mt-3" style="color: #630505;">Menú de la cafetería </h1>
    <div id="person-container">
        <img id="person" class="person-image"  src="{{ Vite::asset('resources/images/asistente.png') }}" alt="Person Icon">
        <div id="bubble">
            <p id="text"></p>
        </div>
    </div>
    @foreach($categorias as $categoria)
        <div class="menu-category">
            <div class="category-header mt-4 mb-4">
                <h2>{{ $categoria->nombre }}</h2>
            </div>
            <div class="row">
                @foreach($productos as $producto)
                    @if($producto->id_categoria == $categoria->id)
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card" style="width: 100%;">
                            <div style="max-width: 150px; margin: 0 auto;">
                                <img src="{{ $producto->foto }}" alt="{{ $producto->nombre }}" class="card-img-top" style="width: 100%; height: auto; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center mb-0">{{ $producto->nombre }}</h5>
                                <div class="menu-item-description mb-2">{{ $producto->descripcion }} </div>
                                <p class="menu-item-price mb-0">
                                    Precio: {{ $producto->precio }} <span style="display: inline-block; margin-left: 5px;">bs</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script>
            const textArray = [
            "¡Bienvenid@ al Cafecito!",
            "Aquí encontrarás información sobre nuestras deliciosas opciones de café.",
            "Desde cafés con leche hasta especialidades exclusivas, estamos para satisfacer tu paladar.",
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

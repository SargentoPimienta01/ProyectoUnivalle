@extends('layout.barra')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Univalle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/asistente_real.css') }}">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <style>
        .container-fluid {
            margin-top: 20px;
        }

        .row:first-child {
            margin-bottom: 20px;
        }

       .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            min-height: 250px;
        }

        .card.zoom-effect:hover {
            transform: scale(1.01);
        }

        .card-body {
            padding: 10px;
            text-align: left;
            flex: 1; 
        }

        .card-title {
            color: var(--amaranth-purple);
        }

        .card-box {
            padding: 10px;
            min-height: 160px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card img {
            width: 100%;
            height: auto;
            display: none;
        }

        /**/
        .casdBox-img {
            padding-top: 20px;
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .casdBox-img .card {
            max-width: 100%;
        }

        .casdBox-img {
            width: 100%;
            height: auto;
        }
        .casdBox-img .card:hover {
        transform: scale(1.05); 
}
    </style>
</head>

<body>
<!--intro inicio-->
    
     <div class="container-fluid casdBox-img">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://tramitespara.com/wp-content/uploads/2023/08/tramites_personalizados.jpg" class="card-img-top" alt="Imagen 1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://example.com/tu_url_de_imagen_2.jpg" class="card-img-top" alt="Imagen 2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://example.com/tu_url_de_imagen_3.jpg" class="card-img-top" alt="Imagen 3">
                </div>
            </div>
        </div>
    </div>
    
    <div class="hero">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Card Image">
                        <div class="card-body card-box">
                            <h5 class="card-title">Descripción de Trámites</h5>
                            <p class="card-text">Aquí encontrarás información sobre los trámites universitarios. Desde gestión académica hasta servicios administrativos, estamos para ayudarte.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--intro fin--> 
    
    <div class="hero">
        <h1 class="text-center mt-3" style="color: #630505;">Información de Trámites</h1>
        <div id="person-container">
            <img id="person" class="person-image"  src="{{ Vite::asset('resources/images/asistente.png') }}" alt="Person Icon">
            <div id="bubble">
                <p id="text"></p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach($ctramites as $ctramite)
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Card Image">
                        <div class="card-body card-box">
                            <h5 class="card-title">{{ $ctramite->nombre_categoria }}</h5>
                            <p class="card-text">{{ $ctramite->descripcion }}</p>
                            <a href="{{ route('tramitesdisponibles', ['id_categoria_tramites' => $ctramite->id_categoria_tramites, 'nombre_categoria' => Str::slug($ctramite->nombre_categoria)]) }}" style="color: black; text-decoration: none; display: inline-block; padding: 15px 20px; background-color: #eee; border: 1px solid #ccc; border-radius: 5px; transition: background-color 0.3s;">
                                Ver Trámites
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const textArray = [
            "¡Bienvenid@ al Departamento de Trámites!",
            "Aquí encontrarás información sobre diferentes tipos de trámites.",
            "Desde gestión académica hasta servicios administrativos, estamos para ayudarte.",
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

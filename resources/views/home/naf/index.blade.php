@extends('layout.barra')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <title>NAF | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/asistente_real.css') }}">
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
            height: 450px;
       
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

        #servicios-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .toggle-button {
            color: black;
            text-decoration: none;
            display: inline-block;
            padding: 15px 20px;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 14px;
            margin: 10px auto;
        }

        .card,
        .service-card,
        .image-card {
            margin: 10px;
            padding: 10px;
            text-align: center;
            background: var(--transparent-white);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
            transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out;
        }

        .image-card img {
            width: 100%;
            height: auto;
            max-width: 300px;
            max-height: 200px;
        }

        .service-card {
            width: calc(100% - 20px);
            display: none;
        }

        .service-card.active {
            display: block;
            opacity: 1;
            height: auto;
        }

        .service-card:hover,
        .image-card:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        #servicios h3 {
            color: rgb(0, 0, 0);
        }

        @media (min-width: 768px) {
            .service-card {
                width: calc(50% - 20px);
            }
        }

        @media (min-width: 992px) {
            .service-card {
                width: calc(33.33% - 20px);
            }
        }

    </style>
</head>

<body>
    <div class="hero">
    <h1 class="text-center mt-3" style="color: #630505;">NAF</h1>
    <div id="person-container">
        <img id="person" class="person-image"  src="{{ Vite::asset('resources/images/asistente.png') }}" alt="Person Icon">
        <div id="bubble">
            <p id="text"></p>
        </div>
    </div>

    <section id="servicios-container">
        <div class="image-card">
            <a href="https://belltech.la/wp-content/uploads/2022/12/Software-y-plataforma-de-atencion-al-cliente-Ventajas-para-tu-empresa-2.jpg" target="_blank">
                <img src="https://belltech.la/wp-content/uploads/2022/12/Software-y-plataforma-de-atencion-al-cliente-Ventajas-para-tu-empresa-2.jpg" alt="Descripción de la imagen 1" style="max-width: 100%; height: auto;">
            </a>
        </div>

        <div class="image-card">
            <a href="https://cdn.www.gob.pe/uploads/document/file/2999129/standard_WhatsApp%20Image%202022-04-06%20at%204.41.45%20PM.jpeg.jpeg" target="_blank">
                <img src="https://cdn.www.gob.pe/uploads/document/file/2999129/standard_WhatsApp%20Image%202022-04-06%20at%204.41.45%20PM.jpeg.jpeg" alt="Descripción de la imagen 2" style="max-width: 100%; height: auto;">
            </a>
        </div>

        {{-- <div class="card">
            <h3>Nuestros Servicios</h3>
            <p>Explora nuestras opciones de servicios, que incluyen asesoramiento académico, información sobre eventos y actividades, acceso a material educativo, y mucho más. Nos esforzamos por proporcionar un ambiente virtual que complemente y enriquezca tu vida estudiantil, asegurando que encuentres las herramientas y la asistencia necesarias en un solo lugar.</p>
            <button onclick="toggleServices()" class="toggle-button">Servicios</button>
        </div> --}}

        {{-- @foreach($plataformasdeatencion as $servicio)
            <div class="service-card hidden">
                <h3>{{ $servicio->servicio }}</h3>
                <p>{{ $servicio->descripcion }}</p>
            </div>
        @endforeach --}}
    </div>
    </section>

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
    <script>
        const textArray = [
            "¡Bienvenid@ a NAF (Atención al Contribuyente)",
            
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

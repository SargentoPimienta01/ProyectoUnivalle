@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de Atención</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: black;
        }

        header {
            background-color: #6e1010;
            color: rgb(102, 14, 14);
            text-align: center;
            padding: 10px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            background-color: #6d1515;
            padding: 10px;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: blue;
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
        .service-card {
            margin: 10px;
            width: calc(90% - 20px);
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

        .image-card {
            margin: 10px;
            padding: 10px;
            text-align: center;
            background: var(--transparent-white);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
            transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out;
        }


        .service-card {
            width: calc(20% - 20px);
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
    </style>
</head>

<body>
    <h1 style="text-align: center; color: maroon;">Plataforma de Atención</h1>

    <section id="servicios-container">
<!-- Card box con imagen 1 -->
<div class="image-card">
    <a href="https://belltech.la/wp-content/uploads/2022/12/Software-y-plataforma-de-atencion-al-cliente-Ventajas-para-tu-empresa-2.jpg" target="_blank">
        <img src="https://belltech.la/wp-content/uploads/2022/12/Software-y-plataforma-de-atencion-al-cliente-Ventajas-para-tu-empresa-2.jpg" alt="Descripción de la imagen 1" style="max-width: 100%; height: auto;">
    </a>
</div>

<!-- Card box con imagen 2 -->
<div class="image-card">
    <a href="https://cdn.www.gob.pe/uploads/document/file/2999129/standard_WhatsApp%20Image%202022-04-06%20at%204.41.45%20PM.jpeg.jpeg" target="_blank">
        <img src="https://cdn.www.gob.pe/uploads/document/file/2999129/standard_WhatsApp%20Image%202022-04-06%20at%204.41.45%20PM.jpeg.jpeg" alt="Descripción de la imagen 2" style="max-width: 100%; height: auto;">
    </a>
</div>

<div class="card">
    <h3>Nuestros Servicios</h3>
    <p>Explora nuestras opciones de servicios, que incluyen asesoramiento académico, información sobre eventos y actividades, acceso a material educativo, y mucho más. Nos esforzamos por proporcionar un ambiente virtual que complemente y enriquezca tu vida estudiantil, asegurando que encuentres las herramientas y la asistencia necesarias en un solo lugar.</p>
    <button onclick="toggleServices()" class="toggle-button">Servicios</button>
</div>

@foreach($plataformasdeatencion as $servicio)
<div class="service-card hidden">
    <h3>{{ $servicio->servicio }}</h3>
    <p>{{ $servicio->descripcion }}</p>
</div>
@endforeach

    </section>

    <script>
        function toggleServices() {
            var serviceCards = document.querySelectorAll('.service-card');
            serviceCards.forEach(function(card) {
                card.classList.toggle('active');
            });
        }
    </script>
</body>
</html>

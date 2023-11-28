@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ Vite::asset('resources/css/plataformadeatencion/estilos.css') }}" rel="stylesheet" type="text/css"/>
    <title>Plataforma de Atención</title>
</head>
<body>
    <header>
        <h1>Plataforma de Atención</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('paservicios') }}">Servicios</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <section id="inicio">
        <h2>Bienvenido a nuestra plataforma de atención</h2>
        <p>Ofrecemos servicios de atención al cliente de alta calidad.</p>
        <button>Conoce más</button>

       
    </section>

    <section id="servicios">
        <h2>Nuestros Servicios</h2>
        <ul>
            <li>Atención al Cliente</li>
            <li>Soporte Técnico</li>
            <li>Asesoramiento Personalizado</li>
            @foreach($plataformasdeatencion as $servicio)
            <li>{{ $servicio->servicio}}</li>
            @endforeach
        </ul>
    </section>

    <section id="contacto">
        <h2>Contacto</h2>
        <p>Estamos aquí para ayudarte. Contáctanos:</p>
        <br>
        <form>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Enviar Mensaje</button>
        </form>
    </section>
    <footer>
        <p>&copy; 2023 Plataforma de Atención. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
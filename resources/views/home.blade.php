<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card" />
    <meta property="og:type" content="website" />
    <meta content="Product Design, Product Management and Webflow Development. I design thoughtful user experiences that piece together a big picture with simple, impactful and shippable solutions focused on the customer" name="description" />
    <title>Univalle | Menu Inicio</title>
    <link href="{{ Vite::asset('resources/css/styles.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ Vite::asset('resources/css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ Vite::asset('resources/css/asistente.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">

    <style>
        body {
            overflow: hidden; /* Desactivamos -> barra de desplazamiento */
        }
        .boton img {
            width: 200px;
            height: 200px;
            height: auto;
        }

        .Opciones table {
            width: 80%;
            margin: auto;
            border-spacing: 20px;
        }

        .Opciones .boton {
            text-align: center;
            position: relative;
        }

        .Opciones {
            margin-top: 100px;
        }

        .Opciones table tr {
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="intro">
        <h1> Univalle </h1>
    </div>
    

    <div class="hero">
        <nav>
            <a href="{{ url('/home') }}">
                <img src="{{ Vite::asset('resources/img/banner.png') }}" alt="Univalle Logo" class="logo">
            </a>

            @if(auth()->check())
                @if(!auth()->user()->hasRole('Usuario'))
                    <button class="buttonS" type="button"><a href="{{ route('admin') }}">Ir al Admin </a></button>
                @else
                    <button class="buttonS" type="button"><a href="{{ route('home') }}">Home  </a></button>
                @endif
            @else
                <button class="buttonS" type="button"><a href="{{ route('login') }}">Inicio de Sesión</a></button>
            @endif
        </nav>

        <div class="Opciones">
            <table>
                <tr>
                    <!-- Fila 1 -->
                    <td>
                        <a class="link" href="{{ route('tramites-inicio') }}">
                            <div class="boton">
                                <img src="{{ Vite::asset('resources/images/tramites.png') }}" alt="Imagen 1">
                            </div>
                            <div class="boton_bg-grad"></div>
                        </a>
                    </td>
                    <td>
                        <a class="link" href="{{ route('cajas') }}">
                            <div class="boton">
                                <img src="{{ Vite::asset('resources/images/cajas.png') }}" alt="Imagen 2">
                            </div>
                            <div class="boton_bg-grad"></div>
                        </a>
                    </td>
                    <td>
                        <a class="link" href="{{ route('naf') }}">
                            <div class="boton">
                                <img src="{{ Vite::asset('resources/images/cafecitoo.png') }}" alt="Imagen 3">
                            </div>
                            <div class="boton_bg-grad"></div>
                        </a>
                    </td>
                    <td>
                        <a class="link" href="{{ route('plataforma-de-atencion') }}">
                            <div class="boton">
                                <img src="{{ Vite::asset('resources/images/cafecitoo.png') }}" alt="Imagen 4">
                            </div>
                            <div class="boton_bg-grad"></div>
                        </a>
                    </td>
                </tr>

                <tr>
                    <!-- Fila 2 -->
                    <td>
                        <a class="link" href="{{ route('cafeteria') }}">
                            <div class="boton">
                                <img src="{{ Vite::asset('resources/images/tramites.png') }}" alt="Imagen 1">
                            </div>
                            <div class="boton_bg-grad"></div>
                        </a>
                    </td>
                    <td>
                        <a class="link" href="{{ route('posgrado') }}">
                            <div class="boton">
                                <img src="{{ Vite::asset('resources/images/cajas.png') }}" alt="Imagen 2">
                            </div>
                            <div class="boton_bg-grad"></div>
                        </a>
                    </td>
                    <td>
                        <a class="link" href="{{ route('biblioteca') }}">
                            <div class="boton">
                                <img src="{{ Vite::asset('resources/images/cafecitoo.png') }}" alt="Imagen 3">
                            </div>
                            <div class="boton_bg-grad"></div>
                        </a>
                    </td>
                    <td>
                        <a class="link" href="{{ route('gabinete-medico') }}">
                            <div class="boton">
                                <img src="{{ Vite::asset('resources/images/cafecitoo.png') }}" alt="Imagen 4">
                            </div>
                            <div class="boton_bg-grad"></div>
                        </a>
                    </td>
                </tr>
            </table>
        </div>

    </div>

    <div id="person-container">
        <!-- Contenido del asistente -->
    </div>

    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/asistenteHome.js') }}"></script>
</body>

</html>

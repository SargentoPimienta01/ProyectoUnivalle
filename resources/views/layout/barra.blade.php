<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Univalle</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            padding-top: 70px;
            margin: 0; /* Asegura que no haya márgenes en el cuerpo del documento */
            --platinum: #EAE8E9ff;
            --chocolate-cosmos: #68091Fff;
            --rosy-brown: #C59682ff;
            --amaranth-purple: #9E0442ff;
            --mountbatten-pink: #9B717Cff;
            --transparent-white: rgba(255, 255, 255, 0.8);
            height: 100vh;
            background: linear-gradient(to right bottom, var(--platinum), var(--chocolate-cosmos));
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .navbar {
            border-radius: 0; /* Ajusta el radio de borde según tus preferencias */
            background-color: var(--chocolate-cosmos);
            backdrop-filter: blur(15px);
            transition: margin-bottom 0.3s;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            margin-right: 10px;
            height: 70px;
        }

        .univalle-text {
            color: #ffffff;
            font-weight: bold;
            font-size: 30px;
            padding: 12px;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-light .navbar-toggler-icon {
            color: black;
        }

        .navbar-light .navbar-nav .nav-link {
            color: var(--platinum);
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: var(--platinum);
        }

        /* Estilo para los nuevos botones en la barra de navegación */
        .univalle-nav-button {
            color: white;
            text-decoration: none;
            font-size: 24px;
            margin-right: 15px;
        }

        .univalle-circle {
            background-color: #630505;
            border-radius: 50%;
            padding: 0px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">

        <div class="navbar-brand">

            <a class="univalle-nav-button univalle-nav-left" id="univalle-backButton">
                <div class="univalle-circle"><i class="fas fa-arrow-left"></i></div>
            </a>
            <a href="{{ route('home') }}" class="univalle-nav-button univalle-nav-left">
                <div class="univalle-circle"><i class="fas fa-home"></i></div>
            </a>
        </div>

        <!-- Nuevos botones en la barra de navegación -->
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}">
                <img src="{{ Vite::asset('resources/img/UnivalleLogo.png') }}" alt="Univalle Logo" height="70">
            </a>
            <span class="univalle-text">UNIVALLE</span>
        </div>

        <button id="custom-toggler" class="navbar-toggler" type="button" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tramites-inicio') }}">Tramites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cajas') }}">Cajas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('naf') }}">Naf</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bienestar-universitario') }}">Bienestar universitario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('biblioteca') }}">Biblioteca</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posgrado') }}">Postgrado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cafeteria') }}">Cafeteria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('direccion-de-carrera') }}">Direccion de carrera</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('campus') }}">Campus</a>
                </li>
            </ul>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var navbarToggler = document.getElementById('custom-toggler');
            var navbarNav = document.getElementById('navbarNav');

            navbarToggler.addEventListener('click', function () {
                navbarNav.classList.toggle('show');
                document.body.classList.toggle('content-below-navbar-show', navbarNav.classList.contains('show'));
            });
        });
    </script>

    <script>
        document.addEventListener('keydown', function (event) {
            // Verificar si la tecla presionada es la tecla de retroceso (backspace)
            if (event.key === 'Backspace') {
                // Realizar la acción deseada, por ejemplo, volver atrás en la historia del navegador
                window.history.back();

                // Evitar el comportamiento predeterminado del navegador para la tecla de retroceso
                event.preventDefault();
            }
        });
        document.getElementById('univalle-backButton').addEventListener('click', function (event) {
            // Verificar si el clic fue realizado en el ícono de flecha izquierda
            if (event.target.closest('.fa-arrow-left')) {
                // Realizar la acción deseada, por ejemplo, volver atrás en la historia del navegador
                window.history.back();
            }
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Univalle</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            padding: 50px;
            --platinum: #EAE8E9ff;
            --chocolate-cosmos: #68091Fff;
            --rosy-brown: #C59682ff;
            --amaranth-purple: #9E0442ff;
            --mountbatten-pink: #9B717Cff;
            --transparent-white: rgba(255, 255, 255, 0.8); 
            margin: 0;
            height: 100vh; /* Establece la altura al 100% de la altura visible */
            background: linear-gradient(to right bottom, var(--platinum), var(--chocolate-cosmos));
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .navbar {
            border-radius: 10px;
            margin-bottom: 20px; 
            background-color: var(--chocolate-cosmos); 
            backdrop-filter: blur(15px);     
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

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-brand">
            <a href="{{ route('home') }}">
                <img src="{{ Vite::asset('resources/img/UnivalleLogo.png') }}" alt="Univalle Logo" height="70">
            </a>
            <span class="univalle-text">UNIVALLE</span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link" href="{{  route('naf') }}">Naf</a>
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

</body>

</html>

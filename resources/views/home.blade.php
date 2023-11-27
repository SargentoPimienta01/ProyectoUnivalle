<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:type" content="website" />
    <title>Univalle | Menu Inicio</title>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    
    <style>
        body {
        overflow: hidden; 
        }

        .boton img {
            width: 100%; 
            height: auto;
        }

        .Opciones table {
            width: 100%; 
            margin: auto;
            border-spacing: 20px;
        }

        .Opciones .boton {
            text-align: center;
            position: relative;
        }

        .Opciones {
            margin-top: 50px;
        }

        .Opciones table tr {
            margin-bottom: 20px;
        }

        @media only screen and (min-width: 600px) {
            .Opciones table {
                width: 80%;
            }
        }

        @media only screen and (min-width: 768px) {
            .Opciones table {
                width: 60%;
            }
        }

        @media only screen and (min-width: 992px) {
            .Opciones table {
                width: 50%;
            }
        }

        @media only screen and (min-width: 1200px) {
            .Opciones table {
                width: 40%;
            }
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-brand">
            <a href="{{ route('home') }}">
                <img src="{{ Vite::asset('resources/img/UnivalleLogo.png') }}" alt="Univalle Logo" height="70">
                <span class="univalle-text">UNIVALLE</span>
            </a>
        </div>
        <div class="navbar-nav ml-auto">
            <button class="buttonS" type="button"><a href="{{ route('login') }}">Inicio de Sesión</a></button>

            @if(auth()->check())
                @if(!auth()->user()->hasRole('Usuario'))
                    <button class="buttonS" type="button"><a href="{{ route('admin') }}">Ir al Admin</a></button>
                @else
                    <button class="buttonS" type="button"><a href="{{ route('home') }}">Home</a></button>
                @endif
            @endif
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div  onclick="window.location.href='{{ route('tramites-inicio') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/TRAMITESS.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Tramites</h5>
                            <p class="card-text">Gestión académica y administrativa.</p>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('cajas') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/CAJASS.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Cajas</h5>
                            <p class="card-text">Finanzas y pagos.</p>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{  route('naf') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/NAFF.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Naf</h5>
                            <p class="card-text">Asesoría tributaria docentes.</p>
                        </div>
                    </div>
                </div>                
            </div>

            

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('bienestar-universitario') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/MEDICOO.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Bienestar Universitario</h5>
                            <p class="card-text">Apoyo estudiantil integral.</p>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('biblioteca') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/BIBLIOTECAA.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Biblioteca</h5>
                            <p class="card-text">Recursos académicos esenciales.</p>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('posgrado') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/POSGRADOO.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Postgrado</h5>
                            <p class="card-text">Estudios avanzados.</p>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('cafeteria') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/CAFETERIAA.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Cafeteria</h5>
                            <p class="card-text">Opciones gastronómicas sociales.</p>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('direccion-de-carrera') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/D_CARRERAA.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Direccion de carrera</h5>
                            <p class="card-text">Coordinación académica específica.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('campus') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/CAMPUSS.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Campus</h5>
                            <p class="card-text">Entorno universitario deportivo.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

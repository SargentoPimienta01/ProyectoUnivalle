<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:type" content="website" />
    <title>Univalle | Menu Inicio</title>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .buttonS {           
            background: #fff;
            color: rgb(0, 0, 0)f3f; 
            padding: 10px 20px; 
            border-radius: 8px; 
            text-decoration: none;
            font-size: 16px;  
        }
        .card {
            margin-bottom: 20px;
            height: 357px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: var(--transparent-white);
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945); 
            transition: transform 1s ease, box-shadow 1s ease; 
        }
        .card img {
            margin-top: 40px;
            width: 200px;
            height: 160px;
        }
        .card-body {
            text-align: center;
        }
        .card:hover {
        transform: scale(1.05); 
        box-shadow: 0 6px 13px rgba(128, 9, 9, 0.945); 
        }

        #header {
            text-align: center;
            margin: 20px;
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            animation: fadeInDown 1.5s ease-in-out;
        }

        #person-container {
        position: fixed;
        width: 200px;
        height: 200px;
        margin: 0;
        bottom: 30px; 
        right: 30px; 
        display: flex;
        background-color: transparent;
        padding: 20px;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        flex-direction: column;
        align-items: flex-end;
        justify-content: flex-end;
        z-index: 99;
    }

    #bubble {
        width: auto;
        max-width: 200px; 
        height: auto;
        background-color: rgba(68, 13, 13, 0.8); 
        text-align: center;
        margin: 30px;
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 15px;

        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        white-space: normal; 
    }

    #person {
        width: 100%;
        height: 100%;
        position: absolute;
        bottom: 0;
        right: 0;
        border-radius: 50%;
        box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
        animation: bounce 2s infinite;
        opacity: 0.7; 
    }

    #text {
        margin: 0;
        font-size: 16px;
        color: #ffffff;
        max-height: 100%; 
        overflow: hidden; 
    }

    @keyframes fadeInUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-brand">
            <a href="{{ route('home') }}">
                <img src="{{ Vite::asset('resources/images/UnivalleLogo.png') }}" alt="Univalle Logo" height="70">
                <span class="univalle-text">UNIVALLE</span>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div id="person-container">
 
        <img id="person" class="person-image"  src="{{ Vite::asset('resources/images/asistente.png') }}" alt="Person Icon">

        <div id="bubble">
            <p id="text"></p>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div  onclick="window.location.href='{{ route('tramites-inicio') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/TRAMITESS.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Información de Tramites</h5>
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
                            <h5 class="card-title">Información de Cajas</h5>
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
                            <h5 class="card-title">Información de Naf</h5>
                            <p class="card-text">Asesoría tributaria docentes.</p>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('direccion-de-carrera') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/D_CARRERAA.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Información de Direcciones de carrera</h5>
                            <p class="card-text">Coordinación académica específica.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('posgrado') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/POSGRADOO.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Información de Postgrados</h5>
                            <p class="card-text">Estudios avanzados.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('bienestar-universitario') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/MEDICOO.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Información de Bienestar Universitario</h5>
                            <p class="card-text">Apoyo estudiantil integral.</p>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('plataforma-de-atencion') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="https://img.freepik.com/free-vector/flat-customer-support-illustration_23-2148899114.jpg?w=740&t=st=1701622438~exp=1701623038~hmac=ff5d16f1f83731a48ee2e60bc4c93b1d786f4aeb01224128217f0d435b92bfb8" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Información de Plataforma de atención</h5>
                            <p class="card-text">Plataforma de atención.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('biblioteca') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/BIBLIOTECAA.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Información de Biblioteca</h5>
                            <p class="card-text">Recursos académicos esenciales.</p>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('cafeteria') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/CAFETERIAA.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Información de Cafeteria</h5>
                            <p class="card-text">Opciones gastronómicas sociales.</p>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="custom-link" onclick="window.location.href='{{ route('campus') }}'" style="cursor: pointer;">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/CAMPUSS.png') }}" alt="Imagen 1">
                        <div class="card-body">
                            <h5 class="card-title">Información de Campus deportivo</h5>
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
    <script>
        const textArray = [
            "¡Hola!",
            "Bienvenid@, estoy aquí para ayudarte.",
            "Seré tu guía a través de la página.",
            "Donde se te proporcionará información",
            "sobre nuestras distintas áreas y servicios.",
            "¡No dudes en explorar y mucha suerte!",
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
                    hideText();
                }, 3000); 
            }
        }
        function hideText() {
            bubble.style.opacity = '0';
            setTimeout(() => {
                bubble.style.visibility = 'hidden';
                showText();
            }, 500); 
        }
    
        showText();
    
        // reiniciar
        personImage.addEventListener('click', () => {
    
            textIndex = 0;
            showText();
        });
    </script>

</body>

</html>
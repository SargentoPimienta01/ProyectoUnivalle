@extends('layouts.jquery')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <meta content="Product Design, Product Management and Webflow Development. I design thoughtful user experiences that piece together a big picture with simple, impactful and shippable solutions focused on the customer" name="description"/>
    <title>Tramites | Univalle</title>
    <link href="{{ Vite::asset('resources/css/styles.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/menu.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/tramites/styles_user_tables.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

      <div class="hero">
        <!-- Barra de Navegacion -->
        <nav>
            <a href="{{ url('/home') }}">
            <img src="{{ Vite::asset('resources/img/banner.png') }}" alt="Univalle Logo" class="logo">
            </a>
            <ul>
                <li><a href="{{ url('/home') }}">Menu</a></li>
                <li><a href="{{ url('/home/tramites') }}">Tramites</a></li>
                <li><a href="{{ url('/home/cajas') }}">Cajas</a></li>
                <li><a href="#">Postgrado</a></li>
            </ul>
            <button class="buttonS" type="button"><a href="{{ route('login') }}">Inicio de Sesion</a></button>
        </nav>

        <div>
            <h2 style="color: white; text-align: center;">Requisitos para el trámite: {{ $tituloTramite }}</h2>
        </div>



        <div class ="contenidopro">

            @foreach ($requisitos as $requisito)

            <div class="">
            <div class="card">
                <div class="face front">
                    <img src="{{ Vite::asset('resources/img/tramites/tramite.jpg') }}" alt="Requisitos">
                    <h3>Requisitos</h3>
                </div>
                <div class="face back">
                    <h3>Requisitos</h3>
                    <p>{{ $requisito->descripcion_requisito }}</p>
                    
                </div>
            </div>
            </div>
    
            <div class="card">
                <div class="face front">
                    <img src="{{ Vite::asset('resources/img/tramites/duracion.jpeg') }}" alt="Duracion">
                    <h3>Duracion</h3>
                </div>
                <div class="face back">
                    <h3>Duracion</h3>
                    <p>{{ $duracionTramite }}</p>
                </div>
            </div>

            <div class="card">
                <div class="face front">
                    <img src="{{ Vite::asset('resources/img/tramites/ubicacion.jpeg') }}" alt="">
                    <h3>Ubicacion</h3>
                </div>
                <div class="face back">
                    <h3>Ubicacion de {{ $ubicacionTramite->nombre }}</h3>
                        <p>
                            Edificio: {{ $ubicacionTramite->edificio }}<br>
                            Planta: @if ($ubicacionTramite->planta == 0)
                                                Planta baja
                                            @else
                                                {{ $ubicacionTramite->planta }}
                                            @endif
                            <br>
                            Horario: {{ $ubicacionTramite->horario }}<br>
                            Horario: {{ $ubicacionTramite->detalles_direccion }}<br>
                            <!-- Agrega más campos según sea necesario -->
                        </p>
                </div>
            </div>

            <style>
    .card {
        width: 290px; /* Ajusta el ancho según tus necesidades */
        height: 407px; /* Ajusta la altura según tus necesidades */
        perspective: 1000px;
    }

    .face {
        width: 100%;
        height: 100%;
        position: absolute;
        backface-visibility: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 10px;
    }

    .front {
        transform: rotateY(0deg);
    }

    .back {
        transform: rotateY(180deg);
    }

    img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 10px 10px 0 0;
    }

    h3 {
        margin-top: 10px;
        font-size: 18px;
    }

    p {
        margin-top: 20px;
        font-size: 14px;
    }

    .contact-info {
        margin-top: 20px;
        text-align: center;
    }

    .contact-link {
        color: #333;
        text-decoration: underline;
        margin-right: 10px;
    }
</style>

<div class="card">
    <div class="face front">
        <img src="https://freerangestock.com/sample/118830/online-search-icon-vector.jpg" alt="">
        <h3>Descarga los requisitos en tu teléfono</h3>
    </div>
    <div class="face back">
        <div class="visible-print text-center">
            <b>Para tu teléfono</b>
            <br>
            <?php
                $pdfUrl = Request::url() . '/pdf';
                $whatsappUrl = "https://wa.me/71968841";
                $correoUrl = "mailto:aalanocae@univalle.edu";
            ?>
            <!--<a href="{{ $pdfUrl }}" style="color: inherit;">Descarga los requisitos.</a>-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pdfModal">Descargar requisitos</button>
            {!! QrCode::size(100)->generate($pdfUrl); !!}
            <div class="contact-info">
                <b>Contactar con Responsable:</b> Aydee Alanoca Endara
                <br>
                <a href="{{ $whatsappUrl }}" class="contact-link" style="color: inherit;">Enviar mensaje de WhatsApp</a>
                <br>
                {!! QrCode::size(75)->generate($whatsappUrl); !!}
                <br>
                <a href="{{ $correoUrl }}" class="contact-link" style="color: inherit;">Enviar mensaje de correo</a>
                <br>
                {!! QrCode::size(75)->generate($correoUrl); !!}
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content" style="height: 90vh;">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 80vh; overflow-y: auto;">
                <!-- Contenedor para el PDF -->
                <iframe src="{{ $pdfUrl }}#view=FitH&hide=1" style="width: 100%; height: 100%; border: none; transform: scale(0.9);"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



            @endforeach
        </div>
        


        
    </div>  

    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>
</html>
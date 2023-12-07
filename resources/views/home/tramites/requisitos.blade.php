@extends('layouts.jquery')
@extends('layouts.backspace')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <title>Tramites | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
              
        }

        .card {
            height: 100%;
            border: 1px solid #ddd;
            border-radius: 8px; 
            transition: transform 0.3s ease-in-out; 
            box-shadow: 0 4px 8px rgba(128, 9, 9, 0.945);
            margin-bottom: 20px;
        }

        .card:hover {
            transform: scale(1.01); 
        }

        .card-body {
            padding: 20px; 
            text-align: left; 
        }

        .card-title {
            font-size: 18px; 
            margin-bottom: 10px; 
        }

        .card-text {
            font-size: 14px; 
            line-height: 1.5;
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

        .contact-info {
            margin-top: 10px;
        }

        .contact-link {
            color: inherit;
            text-decoration: underline;
        }

        .modal-content {
            height: 90vh;
        }

        .modal-body {
            max-height: 80vh;
            overflow-y: auto;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
            transform: scale(0.9);
        }
    </style>
</head>

<body>
    <div class="hero">
        <h1 class="text-center mt-3" style="color: #630505;">Trámite de {{ $tituloTramite }} </h1>

        <div class="contenidopro row">
            @foreach ($requisitos as $requisito)
                <div class="col-md-4s mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Requisitos</h5>
                            <p class="card-text">{!! nl2br($requisito->descripcion_requisito) !!}</p>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4s mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Duración</h5>
                            <p class="card-text">{{ $duracionTramite }}</p>
                            <h5 class="card-title">Ubicación de {{ $ubicacionTramite->nombre }}</h5>
                            <p class="card-text">
                                Edificio: {{ $ubicacionTramite->edificio }}<br>
                                Planta: @if ($ubicacionTramite->planta == 0) Planta baja @else {{ $ubicacionTramite->planta }} @endif
                                <br>
                                Horario: {{ $ubicacionTramite->horario }}<br>
                                Horario: {{ $ubicacionTramite->detalles_direccion }}<br>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4s mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="https://freerangestock.com/sample/118830/online-search-icon-vector.jpg" class="card-img-top mx-auto d-block" alt="Icon" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">

                            <h5 class="card-title">Descarga los requisitos en tu teléfono</h5>
                            <p class="card-text">
 
                                <?php
                                    $pdfUrl = Request::url() . '/pdf';
                                    $whatsappUrl = "https://wa.me/71968841";
                                    $correoUrl = "mailto:aalanocae@univalle.edu";
                                ?>
                                <button style="color: black; text-decoration: none; display: inline-block; padding: 15px 20px; background-color: #eee; border: 1px solid #ccc; border-radius: 5px; transition: background-color 0.3s;"data-toggle="modal" data-target="#pdfModal">Descargar requisitos</button>
                                {!! QrCode::size(150)->generate($pdfUrl) !!}
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4s mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="https://freerangestock.com/sample/118830/online-search-icon-vector.jpg" class="card-img-top mx-auto d-block" alt="Icon" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">

                            <p class="card-text">
                                <div class="contact-info">
                                    <b>Contactar con Responsable:</b> Aydee Alanoca Endara
                                    <br>
                                    <a href="{{ $whatsappUrl }}" class="contact-link">Enviar mensaje de WhatsApp</a>
                                    <br>
                                    <br>
                                    {!! QrCode::size(150)->generate($whatsappUrl) !!}
                                    
                                    <!--
                                    <a href="{{ $correoUrl }}" class="contact-link">Enviar mensaje de correo</a>
                                    <br>
                                    
                                    {!! QrCode::size(150)->generate($correoUrl) !!}
                                </div>
                                <a href="{{ $pdfUrl }}" class="btn btn-custom btn-outline-secondary">Descargar requisitos</a>
                            -->
                            </p>
                        </div>
                    </div>
                </div>
                
                

                <!-- Modal -->
                <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Contenedor para el PDF -->
                                <iframe src="{{ $pdfUrl }}#view=FitH&hide=1"></iframe>
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

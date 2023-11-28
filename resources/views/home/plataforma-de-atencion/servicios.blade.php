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
                <li><a href="{{ route('plataforma-de-atencion') }}">Atrás</a></li>
                <li><a href="{{ route('paservicios') }}">Servicios</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="{{ route('home') }}">Inicio</a></li>
            </ul>
        </nav>
    </header>

    <div class="contenedor">
        @foreach($plataformasdeatencion as $servicio)
        <div class="cuadroInformativo">
            <div class="tituloInf">
                <h3>{{ $servicio->servicio}}</h3>
            </div> 
            <div class="parrafoInf">
                <h3>Detalles</h3>
                <p class="requisitos">{{ $servicio->descripcion}}
                </p>
            </div>
            <div class="parrafoInf">
                <h3>Requisitos</h3>
                <p class="requisitos">{{ $servicio->requisitos}}
                </p>
            </div>
        </div>
        @endforeach

        <div class="cuadroInformativo">
            <div class="tituloInf">
                <h3>Plan de pagos</h3>
            </div> 
            <div class="parrafoInf">
                <h3>Detalles</h3>
                <p class="requisitos">el estudiante puede realizar su plan de pagos y elegir entre las diferentes opciones que estan disponibles
                </p>
            </div>
            <div class="parrafoInf">
                <h3>Requisitos</h3>
                <p class="requisitos"> *Acceso a netvalle.
                    *El estudiante debe hacerlo despues de cancelar los 1000 bs de inscripcion.
                </p>
            </div>
        </div>

        <div class="cuadroInformativo">
            <div class="tituloInf">
                <h3>Plan de pagos</h3>
            </div> 
            <div class="parrafoInf">
                <h3>Detalles</h3>
                <p class="requisitos">el estudiante puede realizar su plan de pagos y elegir entre las diferentes opciones que estan disponibles
                </p>
            </div>
            <div class="parrafoInf">
                <h3>Requisitos</h3>
                <p class="requisitos"> *Acceso a netvalle.
                    *El estudiante debe hacerlo despues de cancelar los 1000 bs de inscripcion.
                </p>
            </div>
        </div>
        <div class="cuadroInformativo">
            <div class="tituloInf">
                <h3>Plan de pagos</h3>
            </div> 
            <div class="parrafoInf">
                <h3>Detalles</h3>
                <p class="requisitos">el estudiante puede realizar su plan de pagos y elegir entre las diferentes opciones que estan disponibles
                </p>
            </div>
            <div class="parrafoInf">
                <h3>Requisitos</h3>
                <p class="requisitos"> *Acceso a netvalle.
                    *El estudiante debe hacerlo despues de cancelar los 1000 bs de inscripcion.
                </p>
            </div>
        </div>
        <div class="cuadroInformativo">
            <div class="tituloInf">
                <h3>Plan de pagos</h3>
            </div> 
            <div class="parrafoInf">
                <h3>Detalles</h3>
                <p class="requisitos">el estudiante puede realizar su plan de pagos y elegir entre las diferentes opciones que estan disponibles
                </p>
            </div>
            <div class="parrafoInf">
                <h3>Requisitos</h3>
                <p class="requisitos"> *Acceso a netvalle.
                    *El estudiante debe hacerlo despues de cancelar los 1000 bs de inscripcion.
                </p>
            </div>
        </div>

        
        
    </div>

    <footer>
        <p>&copy; 2023 Plataforma de Atención. Todos los derechos reservados.</p>
    </footer>
</body>
</html>


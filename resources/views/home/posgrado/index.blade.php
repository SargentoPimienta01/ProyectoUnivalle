@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <title>Postgrado | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link href="{{ Vite::asset('resources/css/cards.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Univalle</title>
</head>
<body>

    <div class="contenedor">
    @foreach($posgrados as $posgrado)
    <div class="cuadroInformativo">
        <div class="contenido">
            <div class="tituloInf">
                <h3>PROGRAMA {{ $posgrado->nombre_posgrado }}</h3>
                <br>
            </div>
            <div class="parrafoInf">
            <b>Descripción:</b>
                <br>
                <p>{{ $posgrado->descripcion }}</p>
                <ul>
                    <li>Modalidad: {{ $posgrado->modalidad }}</li>
                    <li>Categoría: {{ $posgrado->categoria }}</li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach

        <div class="cuadroInformativo">
            <div class="contenido">
                <div class="tituloInf">
                    <h3>ATENCION AL CONTRIBUYENTE</h3>
                </div>
                <div class="parrafoInf">
                    <ul>
                        <li>Declaraciones juridicas</li>
                        <li>Registro compras y ventas</li>
                        <li>Rectificaciones de formularios</li>
                        <li>Consultas varias</li>

                    </ul>
                </div>
                <div class="subTitulo">
                    <p>Requisitos - Ya registrados</p>
                </div>
                <div class="parrafoInf">
                    <ul>
                        <li>NIT</li>
                        <li>Usuario</li>
                        <li>Contraseña</li>
                        <li>Cedula de Identidad</li>
                    </ul>
                </div>
                <div class="subTitulo">
                    <p>Requisitos - No registrados</p>
                </div>
                <div class="parrafoInf">
                    <ul>
                        <li>Cedula de Identidad</li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="cuadroInformativo">
            <div class="contenido">
                <div class="tituloInf">
                    <h3>RE - IVA</h3>
                </div>
                <div class="subTitulo">
                    <p>Requisitos - Ya inscritos</p>
                </div>
                <div class="parrafoInf">
                    <ul>
                        <li>Codigo Beneficiario</li>
                        <li>Usuario</li>
                        <li>Contraseña</li>
                    </ul>
                </div>
                <div class="subTitulo">
                    <p>Requisitos - Inscribirse</p>
                </div>
                <div class="parrafoInf">
                    <ul>
                        <li>Cedula de Identidad</li>
                        <li>Numero de cuenta bancaria</li>
                        <li>Correo Electronico</li>
                    </ul>
                </div>
                
            </div>
        </div>

        <div class="cuadroInformativo">
            <div class="contenido">
                <div class="tituloInf">
                    <h3>DEPENDIENTES (fromulario no sujetos FC- IVA)</h3>
                </div>
                <div class="subTitulo">
                    <p>Requisitos - Ya inscritos</p>
                </div>
                <div class="parrafoInf">
                    <ul>
                        <li>Codigo Dependiente</li>
                        <li>Usuario</li>
                        <li>Contraseña</li>
                    </ul>
                </div>
                <div class="subTitulo">
                    <p>Requisitos - Inscribirse</p>
                </div>
                <div class="parrafoInf">
                    <ul>
                        <li>Cedula de Identidad</li>
                        <li>Codigo Dependiente</li>
                    </ul>
                </div>
                
            </div>
        </div>

        <div class="cuadroInformativo">
            <div class="contenido">
                <div class="tituloInf">
                    <h3>EMISION DE FACTURAS</h3>
                </div>
                <div class="subTitulo">
                    <p>Requisitos</p>
                </div>
                <div class="parrafoInf">
                    <ul>
                        <li>Numero de autorizacion (Manuales)</li>
                    </ul>
                </div>
                <div class="subTitulo">
                    <p>Requisitos - ERTRONICA</p>
                </div>
                <div class="parrafoInf">
                    <ul>
                        <li>Accesos</li>
                        <li>NIT</li>
                        <li>Usuario</li>
                        <li>Contraseña</li>
                        <li>Datos de cliente</li>
                        <li>Servicios o Producto</li>

                    </ul>
                </div>
                
            </div>
        </div>

        <div class="cuadroInformativo">
            <div class="contenido">
                <div class="tituloInf">
                    <h3>FACILIDADES DE PAGO</h3>
                </div>
                <div class="subTitulo">
                    <p>Requisitos</p>
                </div>
                <div class="parrafoInf">
                    <ul>
                        <li>Acceso </li>
                        <li>NIT</li>
                        <li>Usuario</li>
                        <li>Contraseña</li>
                    </ul>
                </div>  
            </div>
        </div>
    </div>
</body>
</html>

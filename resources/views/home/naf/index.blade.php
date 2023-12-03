@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <title>Naf | Univalle</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/img/UnivalleLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
    @foreach($nafs as $naf)
    <div class="contenedor">
        <div class="cuadroInformativo">
            <div class="contenido">
                <div class="tituloInf">
                    <h3>{{ strtoupper($naf->nombre_naf) }}</h3>
                </div>
                <div class="parrafoInf">
                    <ul>
                    @php
                        if ($naf->descripcion !== null) {
                            $lineas = explode("\n", $naf->descripcion);
                            foreach ($lineas as $linea) {
                                $elementos = explode(',', $linea);
                                foreach ($elementos as $elemento) {
                                    echo '<li>' . trim($elemento) . '</li>';
                                }
                            }
                        }
                    @endphp
                    </ul>
                </div>
                @foreach($requisitosNaf as $requisitoNaf)
                @if($requisitoNaf->Id_naf == $naf->Id_naf)
                    <div class="subTitulo">
                        <p>Requisitos - {{ $requisitoNaf->nombre_requisito }}</p>
                    </div>
                    <div class="parrafoInf">
                        <ul>
                            @php
                                $lineas = explode("\n", $requisitoNaf->descripcion_requisito);
                                foreach ($lineas as $linea) {
                                    $elementos = explode(',', $linea);
                                    foreach ($elementos as $elemento) {
                                        echo '<li>' . trim($elemento) . '</li>';
                                    }
                                }
                            @endphp
                        </ul>
                    </div>
                @endif
            @endforeach
            </div>
        </div>
    </div>
    @endforeach
</body>
</html>

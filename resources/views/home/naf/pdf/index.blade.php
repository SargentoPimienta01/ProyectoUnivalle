<!DOCTYPE html>
<html lang="en">

<head>
    <title>NAFs_pdf</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .logo {
            max-width: 100px;
        }

        h1 {
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .contenidopro {
            margin-top: 20px;
        }

        .hero {
            border: 1px solid #ddd;
            padding: 20px;
        }

        .contenedor {
            margin-top: 20px;
        }

        .cuadroInformativo {
            border: 1px solid #ddd;
            padding: 20px;
        }

        .contenido {
            text-align: center;
        }

        .tituloInf {
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .subTitulo {
            margin-top: 10px;
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }

        .parrafoInf ul {
            list-style: none;
            padding: 0;
        }

        .parrafoInf li {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Univalle_bol_cbb_logo.png" alt="Logo" class="logo">
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

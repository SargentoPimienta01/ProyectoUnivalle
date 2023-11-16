<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $tituloTramite }}_pdf</title>
    <style>
        /* Puedes agregar estilos CSS según sea necesario */
        body {
            font-family: Arial, sans-serif;
            margin: 20px; /* Añade un margen alrededor del cuerpo */
        }

        .logo {
            max-width: 100px; /* Ajusta el tamaño de acuerdo a tus necesidades */
        }

        h1 {
            border-bottom: 2px solid #333; /* Añade un borde inferior al título */
            padding-bottom: 10px; /* Añade espacio debajo del título */
        }

        table {
            width: 100%;
            border-collapse: collapse; /* Colapsa los bordes de la tabla para una apariencia más limpia */
            margin-top: 20px; /* Añade espacio sobre la tabla */
        }

        th, td {
            border: 1px solid #ddd; /* Añade bordes a las celdas */
            padding: 8px; /* Añade espacio interno a las celdas */
            text-align: left; /* Alinea el texto a la izquierda en las celdas */
        }

        th {
            background-color: #f2f2f2; /* Agrega un color de fondo a las celdas de encabezado */
        }

        .contenidopro {
            margin-top: 20px; /* Añade espacio sobre el contenido de la tabla */
        }

        .hero {
            border: 1px solid #ddd; /* Añade un borde alrededor del contenido */
            padding: 20px; /* Añade espacio interno alrededor del contenido */
        }
    </style>
</head>

<body>
    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Univalle_bol_cbb_logo.png" alt="Logo" class="logo">
    <h1>Requisitos del trámite:{{ $tituloTramite }}</h1>

    <div class="hero">
        <div class="contenidopro">
            <table>
                <thead>
                    <tr>
                        <th>Requisitos</th>
                        <th>Duracion</th>
                        <th>Ubicacion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requisitos as $requisito)
                        <tr>
                            <td>{{ $requisito->descripcion_requisito }}</td>
                            <td>{{ $duracionTramite }}</td>
                            <td>
                                <strong>Nombre:</strong> {{ $ubicacionTramite->nombre }}<br>
                                <strong>Edificio:</strong> {{ $ubicacionTramite->edificio }}<br>
                                <strong>Planta:</strong>
                                @if ($ubicacionTramite->planta == 0)
                                    Planta baja
                                @else
                                    {{ $ubicacionTramite->planta }}
                                @endif
                                <br>
                                <strong>Horario:</strong> {{ $ubicacionTramite->horario }}<br>
                                <strong>Detalles de la dirección:</strong> {{ $ubicacionTramite->detalles_direccion }}<br>
                                <!-- Agrega más campos según sea necesario -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ Vite::asset('resources/js/intro.js') }}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $servicioDireccion->carrera }}_pdf</title>
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

        .hero {
            border: 1px solid #ddd; /* Añade un borde alrededor del contenido */
            padding: 20px; /* Añade espacio interno alrededor del contenido */
            margin-top: 20px; /* Añade espacio sobre el contenido de la tabla */
        }

        .card {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        .face {
            flex: 1;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Univalle_bol_cbb_logo.png" alt="Logo" class="logo">
    <h1>Servicios de: {{ $servicioDireccion->carrera }}</h1>
    
    <div class="hero">
        @foreach ($servicios as $servicio)
            <div class="card">
                <div class="face">
                    <h3>Servicio</h3>
                    <p>{{ $servicio->Titulo }}</p>
                </div>

                <div class="face">
                    <h3>Requisitos</h3>
                    <p>{{ $servicio->Requisitos }}</p>
                </div>

                <div class="face">
                    <h3>Ubicación</h3>
                    <p>{{ $ubicacion->nombre_ubicacion }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>

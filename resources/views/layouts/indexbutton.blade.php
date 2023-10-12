<!DOCTYPE html>
<html>
<head>
    <style>
        /* Estilos para el botón flotante */
        .boton-flotante {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #9d033f;
            color: white;
            border: 2px solid #9d033f;
            border-radius: 15px; /* Bordes más redondeados */
            padding: 20px 40px; /* Mayor tamaño del botón */
            font-size: 24px; /* Tamaño de texto más grande */
            cursor: pointer;
            z-index: 999;
        }

        /* Estilos para el efecto al pasar el mouse sobre el botón */
        .boton-flotante:hover {
            background-color: white;
            color: #9d033f;
        }
    </style>
</head>
<body>
    <a class="boton-flotante" href="{{ route('home') }}">Inicio</a>
</body>
</html>

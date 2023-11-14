<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        /* Puedes agregar estilos CSS según sea necesario */
        body {
            font-family: Arial, sans-serif;
        }
        .logo {
            max-width: 100px; /* Ajusta el tamaño de acuerdo a tus necesidades */
        }
    </style>
</head>
<body>
    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Univalle_bol_cbb_logo.png" alt="Logo" class="logo">
    <h1>{{ $title }}</h1>
    <p>{{ $content }}</p>
</body>
</html>

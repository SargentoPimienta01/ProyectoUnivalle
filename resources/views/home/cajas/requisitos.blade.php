<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <meta content="Product Design, Product Management and Webflow Development. I design thoughtful user experiences that piece together a big picture with simple, impactful and shippable solutions focused on the customer" name="description"/>
    <title>Cajas | Univalle</title>
    <link href="{{ Vite::asset('resources/css/tramites/styles.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/tramites/styles_user_tables.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/css/styles.css') }}">
    
</head>
<body>
  
    <div class="titulo">
      <h2>Requisitos para la caja: {{ $requisitoCaja->nombre_caja }}</h2>
    </div>
      
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Detalle</th>
                    <th>Requisitos</th>
                    <th>Descripción de requisito</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requisitos as $requisito)
                <tr>
                    <td>{{ $requisito->Id_requisito }}</td>
                    <td>{{ $requisito->nombre_requisito }}</td>
                    <td>{{ $requisito->descripcion_requisito }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

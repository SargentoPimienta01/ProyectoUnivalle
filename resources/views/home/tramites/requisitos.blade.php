@extends('layouts.indexbutton')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="summary_large_image" name="twitter:card"/>
    <meta property="og:type" content="website"/>
    <meta content="Product Design, Product Management and Webflow Development. I design thoughtful user experiences that piece together a big picture with simple, impactful and shippable solutions focused on the customer" name="description"/>
    <title>Tramites | Univalle</title>
    <link href="{{ Vite::asset('resources/css/tramites/styles.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Vite::asset('resources/css/tramites/styles_user_tables.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/css/styles.css') }}">
    
</head>
<body>
  
    <div class="titulo">
      <h2>Requisitos para el trámite: {{ $nombreTramite }}</h2>
    </div>
      
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Detalle</th>
                    <th>Requisitos</th>
                    <th>Duracion de tramite</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>DET</td>
                    <td>REQ</td>
                    <td>DUR</td> 
                </tr>
                <tr>
                @foreach ($requisitos as $requisito)
                    <td>{{ $requisito->nombre_requisito }}</td>
                @endforeach
                @foreach ($requisitos as $requisito)
                    <td>{{ $requisito->descripcion_requisito }}</td>
                @endforeach
                    <td>{{ $duracionTramite }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
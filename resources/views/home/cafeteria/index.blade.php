@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria Menu</title>

    <link href="{{ Vite::asset('resources/css/cafeteria.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nav.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="mt-5 container-fluid">
    <h1 class="text-center mt-3" style="color: #630505;">Menu de la cafeteria </h1>
    @foreach($categorias as $categoria)
    <div class="menu-category">
        <div class="category-header">
            <h2>{{ $categoria->nombre }}</h2>
        </div>
        <table class="table menu-table">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    @if($producto->id_categoria == $categoria->id)
                        <tr class="menu-item">
                            <td><img src="{{ $producto->foto }}" alt="{{ $producto->nombre }}"></td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td class="menu-item-price">{{ $producto->precio }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach


    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>


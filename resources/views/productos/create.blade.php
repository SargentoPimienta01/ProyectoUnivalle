@extends('layout/template')

@section('title', 'Registrar Producto')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Registrar Producto</h2>

        @if($errors->any())

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
            @foreach($errors->all() as $error)
             <li>{{$error}}</li>
            @endforeach
            </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif

        <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="text" class="form-control" name="precio" id="precio" required>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría:</label>
                <select class="form-select" name="categoria" id="categoria" required>
                    <option value="" disabled selected>Selecciona una Categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control" name="foto" id="foto">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</main>

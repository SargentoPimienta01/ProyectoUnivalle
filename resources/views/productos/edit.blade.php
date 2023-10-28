@extends('layout/template')

@section('title', 'Editar Producto')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Editar Producto</h2>

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

        <form action="{{url('productos/'.$producto->id)}}" method="post">
        @method("PUT")
            @csrf
         <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto:</label>
            <div class="col-sm-5">
                <!-- Mostrar la foto actual o proporcionar la opción de cargar una nueva -->
                <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
            </div>
         </div>

         <div class="mb-3 row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{$producto->nombre}}" required>
            </div>
         </div>

         <div class="mb-3 row">
            <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$producto->descripcion}}" required>
            </div>
         </div>

         <div class="mb-3 row">
            <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="precio" id="precio" value="{{$producto->precio}}" required>
            </div>
         </div>

        <a href="{{url('productos')}}" class="btn btn-secondary">Regresar</a>
         <button type="submit" class="btn btn-success">Editar</button>
        </form>
    </div>
</main>

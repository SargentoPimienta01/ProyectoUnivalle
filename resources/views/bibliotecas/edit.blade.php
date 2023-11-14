@extends('layout/template')

@section('title', 'Editar Producto')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Editar Anuncio</h2>

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

        <form action="{{url('bibliotecas/'.$biblioteca->id)}}" method="post">
        @method("PUT")
            @csrf
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">Foto:</label>
                <div class="col-sm-5">
                    <!-- Display the current photo or provide the option to upload a new one -->
                    <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="titulo" class="col-sm-2 col-form-label">Título:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="titulo" id="titulo" value="{{$producto->nombre}}" required>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$producto->descripcion}}" required>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
                <div class="col-sm-5">
                    <!-- Adjust the type accordingly, assuming it's a date input -->
                    <input type="date" class="form-control" name="fecha" id="fecha" value="{{$producto->fecha}}" required>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="hora" class="col-sm-2 col-form-label">Hora:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="hora" id="hora" value="{{$producto->hora}}" required>
                </div>
            </div>
            

        <a href="{{url('bibliotecas')}}" class="btn btn-secondary">Regresar</a>
         <button type="submit" class="btn btn-success">Editar</button>
        </form>
    </div>
</main>

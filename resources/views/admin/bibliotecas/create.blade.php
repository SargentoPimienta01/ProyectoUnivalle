@extends('adminlte::page')

@section('title', 'Admin | Registrar Anuncio de Biblioteca')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
<main>
    <div class="container py-4">
        <h2>Registrar Anuncio</h2>

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

        <form action="{{ route('bibliotecas.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="text" class="form-control" name="fecha" id="fecha" value="{{ $fechaHoraActual->format('Y-m-d') }}" readonly>
            </div>

            <div class="mb-3">
                <label for="hora" class="form-label">Hora actual - La Paz, Bolivia:</label>
                <input type="text" class="form-control" name="hora" id="hora" value="{{ $fechaHoraActual->format('H:i') }}" readonly>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría:</label>
                <select class="form-select" name="categoria" id="categoria" required>
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="Anuncio">Anuncio</option>
                    <option value="Evento">Evento</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control" name="foto" id="foto" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('bibliotecas.index') }}" class="btn btn-danger">{{ __('Volver') }}</a>
        </form>
    </div>
</main>
@endsection

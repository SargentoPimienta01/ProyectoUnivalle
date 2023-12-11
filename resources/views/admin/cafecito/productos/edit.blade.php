@extends('adminlte::page')

@section('title', 'Admin | Editar producto Cafetería')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
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

        <form action="{{ url('productos/'.$producto->id) }}" method="post" enctype="multipart/form-data">
            @method("PUT")
            @csrf

            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">Foto:</label>
                <div class="col-sm-5">
                    <!-- Mostrar la foto actual o proporcionar la opción de cargar una nueva -->
                    <input type="file" class="form-control" name="foto" id="foto" accept="image/*" onchange="previewImage(this);">
                    <img src="{{ $producto->foto }}" alt="Imagen Actual" class="img-thumbnail" style="max-width: 300px; margin-top: 10px;" id="preview">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $producto->nombre }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $producto->descripcion }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="precio" id="precio" value="{{ $producto->precio }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="id_categoria" class="form-label">Categoría:</label>
                <select class="form-select" name="id_categoria" id="id_categoria" required>
                    <option value="" disabled>Selecciona una Categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->id_categoria ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Editar</button>
            <a href="{{ url('productos') }}" class="btn btn-secondary">Regresar</a>
        </form>

        <script>
            function previewImage(input) {
                var preview = document.getElementById('preview');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </div>
</main>
@endsection

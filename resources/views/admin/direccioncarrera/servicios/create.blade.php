@extends('adminlte::page')

@section('title', 'Crear Servicio Dirección')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Crear Servicio Dirección</h3>
                    </div>
                    <div class="card-body">
                        <!-- Agrega aquí el formulario de creación -->
                        <form action="{{ route('servicio-direccion.store', ['direccion_carrera_id' => $direccion_carrera_id]) }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="Titulo">Título:</label>
                                <input type="text" name="Titulo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Image">Imagen:</label>
                                <input type="text" name="Image" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Requisitos">Requisitos:</label>
                                <textarea name="Requisitos" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select name="estado" class="form-control" required>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar Servicio Dirección</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                        <form action="{{ route('servicio-direccion.store', ['direccion_carrera_id' => $direccion_carrera_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="Titulo">Título:</label>
                                <input type="text" name="Titulo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen:</label>
                                <input type="file" name="imagen" class="form-control" required>
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

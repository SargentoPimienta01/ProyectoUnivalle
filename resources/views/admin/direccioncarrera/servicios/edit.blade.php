@extends('adminlte::page')

@section('title', 'Editar Servicio de Dirección')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Editar Servicio de Dirección</h3>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('servicio-direccion.update', ['direccion_carrera_id' => $servicioDireccion->direccion_carrera_id, 'id' => $servicioDireccion->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Campos del formulario con valores actuales -->
                            <div class="form-group">
                                <label for="Titulo">Título:</label>
                                <input type="text" name="Titulo" class="form-control" value="{{ $servicioDireccion->Titulo }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Image">Imagen:</label>
                                <input type="text" name="Image" class="form-control" value="{{ $servicioDireccion->Image }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Requisitos">Requisitos:</label>
                                <textarea name="Requisitos" class="form-control" required>{{ $servicioDireccion->Requisitos }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select name="estado" class="form-control" required>
                                    <option value="1" {{ $servicioDireccion->estado == 1 ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ $servicioDireccion->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>
                            <!-- Agrega más campos según sea necesario -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

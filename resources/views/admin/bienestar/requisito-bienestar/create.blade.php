@extends('adminlte::page')

@section('title', 'Crear Requisito de Bienestar')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Crear Requisito de Bienestar</h3>
                    </div>
                    <div class="card-body">
                        <!-- Agrega aquí el formulario de creación -->
                        <form action="{{ route('requisito-bienestares.store', ['id_bienestar' => $id_bienestar]) }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="servicio">Servicio:</label>
                                <input type="text" name="servicio" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle:</label>
                                <input type="text" name="detalle" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="requisitos">Requisitos:</label>
                                <textarea name="requisitos" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="horarios">Horarios:</label>
                                <textarea name="horarios" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select name="estado" class="form-control" required>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id_bienestar" value="{{ $id_bienestar }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar Requisito</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

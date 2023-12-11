@extends('adminlte::page')

@section('title', 'Admin | Editar Requisito de Trámite')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Editar Requisito de Trámite</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('requisito-bienestares.update', ['id_bienestar' => $requisitoBienestar->Id_bienestar, 'id' => $requisitoBienestar->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Campos del formulario con valores actuales -->
                            <div class="form-group">
                                <label for="servicio">Servicio:</label>
                                <input type="text" name="servicio" class="form-control" value="{{ $requisitoBienestar->servicio }}" required>
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle:</label>
                                <input type="text" name="detalle" class="form-control" value="{{ $requisitoBienestar->detalle }}" required>
                            </div>
                            <div class="form-group">
                                <label for="requisitos">Requisitos:</label>
                                <textarea name="requisitos" class="form-control" required>{{ $requisitoBienestar->requisitos }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="horarios">Horarios:</label>
                                <textarea name="horarios" class="form-control" required>{{ $requisitoBienestar->horarios }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select name="estado" class="form-control" required>
                                    <option value="1" {{ $requisitoBienestar->estado == 1 ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ $requisitoBienestar->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>
                            <!-- Agrega más campos según sea necesario -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                <a href="{{ route('requisito-bienestares.index', ['id_bienestar' => $id_bienestar]) }}" class="btn btn-danger">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

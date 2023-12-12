@extends('adminlte::page')
@extends('layouts.jquery')

@section('template_title')
    Dirección Carrera - Inactivos
@endsection
@section('title', 'Admin | Direcciones de carrera inactivas')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
<div class="container py-1">
        <h2>Listado de Direcciones de carrera inactivas</h2>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Dirección Carrera - Inactivos') }}
                        </span>

                        <a href="{{ route('direccion-carrera.index') }}" class="btn btn-danger">
                            {{ __('Volver a carreras activas') }}
                        </a>
                    </div>
                </div>
                @if (session('success'))
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            Swal.fire({
                                title: 'Éxito',
                                text: '{{ session('success') }}',
                                icon: 'success'
                            });
                        </script>
                        @endif
                        @if (session('error'))
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                Swal.fire({
                                    title: 'Error!',
                                    text: '{{ session('error') }}',
                                    icon: 'error'
                                });
                            </script>
                        @endif
                        @if (session('fail'))
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                Swal.fire({
                                    title: 'Error!',
                                    text: '{{ session('fail') }}',
                                    icon: 'error'
                                });
                            </script>
                        @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Carrera</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($direccionCarreras as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->carrera }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                                        <td>
                                            <!-- Botón para abrir el modal de edición -->
                                            <!--<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editDireccionCarreraModal{{ $item->id }}">
                                                <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                            </button>-->
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $item->id }}">
                                                {{('Cambiar Estado') }}
                                            </button>
                                        </td>

                                        <!-- Modal de Confirmación para Cambio de Estado -->
                                        <div class="modal fade" id="confirmChangeState{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea cambiar el estado de esta carrera?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('direccion-carrera.cambiarEstado', $item->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning">Confirmar Cambio de Estado</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal para editar Dirección Carrera -->
                                        <div class="modal fade" id="editDireccionCarreraModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar Registro de Dirección Carrera</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Agregado: Formulario de edición -->
                                                        <form action="{{ route('direccion-carrera.update', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="carrera">Carrera:</label>
            <input type="text" name="carrera" class="form-control" placeholder="Ingrese la carrera" value="{{ isset($item) ? $item->carrera : old('carrera') }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" placeholder="Ingrese la descripción" required>{{ isset($item) ? $item->descripcion : old('descripcion') }}</textarea>
        </div>
        <div class="form-group">
            <label for="facultad">Facultad:</label>
            <input type="text" name="facultad" class="form-control" placeholder="Ingrese la facultad" value="{{ isset($item) ? $item->facultad : old('facultad') }}" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control" required>
                <optgroup label="Activo">
                    <option value="1" {{ (isset($item) && $item->estado == 1) ? 'selected' : '' }}>Activo</option>
                </optgroup>
                <optgroup label="Inactivo">
                    <option value="0" {{ (isset($item) && $item->estado == 0) ? 'selected' : '' }}>Inactivo</option>
                </optgroup>
            </select>
        </div>
        <div class="form-group" style="display:none;">
            <label for="Id_area">ID Área:</label>
            <input type="number" name="Id_area" class="form-control" placeholder="Ingrese el ID de Área" value="{{ isset($item) ? $item->Id_area : old('Id_area', 8) }}" required>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
</div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $direccionCarreras->links() }}
        </div>
    </div>
</div>
@endsection

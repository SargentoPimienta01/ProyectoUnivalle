@extends('adminlte::page')
@extends('layouts.jquery')

@section('template_title')
    Bienestar Universitario
@endsection

@section('content')
<div class="card-body">
    <div class="mb-3">
        <form action="{{ route('bienestar.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
                @if($search)
                    <div class="input-group-append">
                        <a href="{{ route('bienestar.index') }}" class="btn btn-outline-danger">Limpiar</a>
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Bienestar Universitario') }}
                        </span>
                        <a href="{{ route('bienestar.inactivos') }}" class="btn btn-secondary">
                            {{ __('Ir a servicios inactivos') }}
                        </a>
                        <a href="{{ route('admin') }}" class="btn btn-danger">
                            {{ __('Volver a Admin') }}
                        </a>
                        <div class="float-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createBienestarModal">
                                {{ __('Crear nuevo registro') }}
                            </button>
                        </div>
                        
                        <div class="modal fade" id="createBienestarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Registro de Bienestar Universitario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('bienestar.store') }}" method="POST">
                                            @csrf
                                            @include('admin.bienestar.form')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Servicio</th>
                                    <th>Detalle</th>
                                    <th>Estado</th>
                                    <!--<th>Id Área</th>-->
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bienestarUniversitario as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->servicio }}</td>
                                        <td>{{ $item->detalle }}</td>
                                        <td>{{ $item->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                                        <!--<td>{{ $item->Id_area }}</td>-->
                                        <td>
                                            <!-- Botón para abrir el modal de edición -->
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editBienestarModal{{ $item->id }}">
                                                <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $item->id }}">
                                                <i class="fa fa-fw fa-exchange"></i> {{ __('Cambiar Estado') }}
                                            </button>
                                            <a class="btn btn-sm btn-secondary" href="{{ route('requisito-bienestares.index', ['id_bienestar' => $item->id]) }}">
                                                <i class="fa fa-fw fa-exchange"></i> {{ __('Administrar requisitos') }}
                                            </a>
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
                                                        ¿Está seguro de que desea cambiar el estado de este servicio?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('bienestar.cambiarEstado', $item->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning">Confirmar Cambio de Estado</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal fade" id="editBienestarModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar Registro de Bienestar Universitario</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Agregado: Formulario de edición -->
                                                                    <form action="{{ route('bienestar.update', $item->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        @include('admin.bienestar.form')
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
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
        </div>
    </div>
</div>
@endsection

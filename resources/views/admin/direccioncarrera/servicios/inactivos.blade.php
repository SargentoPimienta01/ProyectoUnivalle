@extends('adminlte::page')

@section('title', 'Servicios de Dirección Inactivos')
@section('title', 'Admin | Servicios inactivos de direcciones de carrera')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
<div class="container py-1">
        <h2>{{ __('Servicios inactivos de Direcciones de carrera') }}</h2>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Servicios de Dirección Inactivos') }}
                            </span>

                            <a href="{{ route('direccion-carrera.index') }}" class="btn btn-danger">
                                {{ __('Volver a Direcciones de Carrera') }}
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
                                        <th>Título</th>
                                        <th>Imagen</th>
                                        <th>Requisitos</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($serviciosInactivos as $servicioInactivo)
                                    <tr>
                                        <td>{{ $servicioInactivo->id }}</td>
                                        <td>{{ $servicioInactivo->Titulo }}</td>
                                        <td>{{ $servicioInactivo->Image }}</td>
                                        <td>{{ $servicioInactivo->Requisitos }}</td>
                                        <td>
                                            {{ $servicioInactivo->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </td>
                                        <td>
                                        <a href="{{ route('servicio-direccion.edit', ['id' => $servicioInactivo->id, 'direccion_carrera_id' => $servicioInactivo->direccion_carrera_id]) }}" class="btn btn-success">Modificar</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmChangeState{{ $servicioInactivo->id }}">
                                                <i class="fa fa-fw fa-power-off"></i> {{ __('Cambiar Estado') }}
                                            </a>
                                        </td>
                                    </tr>

                                <!-- Modal de Confirmación para Cambio de Estado -->
                                    <div class="modal fade" id="confirmChangeState{{ $servicioInactivo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Está seguro de que desea cambiar el estado de este servicio de dirección?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('servicio-direccion.cambiarEstado', ['direccion_carrera_id' => $servicioInactivo->direccion_carrera_id, 'id' => $servicioInactivo->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning">Confirmar Cambio de Estado</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $serviciosInactivos->links() !!}
            </div>
        </div>
    </div>
@endsection

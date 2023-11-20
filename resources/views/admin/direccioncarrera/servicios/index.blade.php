@extends('adminlte::page')

@section('title', 'Servicios de Dirección de carrera')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Servicios de Dirección de carrera: ') }}{{ $direccionCarrera->carrera }}
                            </span>

                            <a href="{{ route('direccion-carrera.index') }}" class="btn btn-danger">
                                {{ __('Volver a Direcciones de Carrera') }}
                            </a>

                            <a href="{{ route('servicio-direccion.inactivos', ['direccion_carrera_id' => $direccionCarrera->id]) }}" class="btn btn-secondary">
    {{ __('Ir a servicios inactivos') }}
</a>


                            <!-- Botón que abre el modal -->
<a href="{{ route('servicio-direccion.create', ['direccion_carrera_id' => $direccion_carrera_id]) }}" class="btn btn-primary float-right" data-placement="left">
    {{ __('Agregar servicio dirección') }}
</a>


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
                                        <th>Titulo</th>
                                        <th>Image</th>
                                        <th>Requisitos</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviciosDireccion as $servicioDireccion)
                                        <tr>
                                            <td>{{ $servicioDireccion->id }}</td>
                                            <td>{{ $servicioDireccion->Titulo }}</td>
                                            <td>{{ $servicioDireccion->Image }}</td>
                                            <td>{{ $servicioDireccion->Requisitos }}</td>
                                            <td>
                                                {{ $servicioDireccion->estado == 1 ? 'Activo' : 'Inactivo' }}
                                            </td>
                                            <td>
                                                <a href="{{ route('servicio-direccion.edit', ['id' => $servicioDireccion->id, 'direccion_carrera_id' => $servicioDireccion->direccion_carrera_id]) }}" class="btn btn-success">Modificar</a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#confirmChangeState{{ $servicioDireccion->id }}">
                                                    Cambiar Estado
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Modal de Confirmación para Cambio de Estado -->
                                        <div class="modal fade" id="confirmChangeState{{ $servicioDireccion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea cambiar el estado de este servicio dirección?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('servicio-direccion.cambiarEstado', ['direccion_carrera_id' => $servicioDireccion->direccion_carrera_id, 'id' => $servicioDireccion->id]) }}" method="POST">
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
                {!! $serviciosDireccion->links() !!}
            </div>
        </div>
    </div>
@endsection

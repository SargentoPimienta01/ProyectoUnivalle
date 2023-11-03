@extends('adminlte::page')

@section('template_title')
    Requisito Caja
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisito Caja') }}
                            </span>

                            <div class="float-right">
    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#createRequisitoCajaModal">
        {{ __('Agregar') }}
    </button>
</div>

<!-- Modal para la creación de Requisito Caja -->
<div class="modal fade" id="createRequisitoCajaModal" tabindex="-1" role="dialog" aria-labelledby="createRequisitoCajaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRequisitoCajaModalLabel">{{ __('Create New Requisito Caja') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('cajas.requisitos.store') }}"  role="form" enctype="multipart/form-data">
                @csrf
                @include('requisito-caja.form')
            </form>
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
                                        <th>Nombre Requisito</th>
                                        <th>Descripcion Requisito</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisitoCajas as $requisitoCaja)
                                        <tr>
                                            <td>{{ $requisitoCaja->Id_requisito }}</td>
                                            <td>{{ $requisitoCaja->nombre_requisito }}</td>
                                            <td>{{ $requisitoCaja->descripcion_requisito }}</td>
                                            <td>
                                                {{ $requisitoCaja->estado == 1 ? 'Activo' : 'Inactivo' }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{ route('cajas.requisitos.edit', $requisitoCaja->Id_requisito) }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                </a>
                                                <button type="button" class="btn btn-sm btn-{{ $requisitoCaja->estado == 1 ? 'danger' : 'success' }}" data-toggle="modal" data-target="#confirmChangeState{{ $requisitoCaja->Id_requisito }}">
                                                <i class="fa fa-fw fa-power-off"></i>
                                                {{ $requisitoCaja->estado == 1 ? 'Desactivar' : 'Activar' }}
                                            </button>

                                            <!-- Modal de confirmación para cambiar el estado -->
                                            <div class="modal fade" id="confirmChangeState{{ $requisitoCaja->Id_requisito }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Está seguro de que desea cambiar el estado de este requisito?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('cajas.requisitos.cambiarEstado', $requisitoCaja->Id_requisito) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-{{ $requisitoCaja->estado == 1 ? 'success' : 'danger' }}">
                                                                    Confirmar Cambio de Estado
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $requisitoCajas->links() !!}
            </div>
        </div>
    </div>
@endsection

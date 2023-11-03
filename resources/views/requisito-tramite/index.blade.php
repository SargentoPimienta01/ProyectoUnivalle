@extends('adminlte::page')
@extends('layouts.jquery')

@section('template_title')
    Requisito Tramite
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisitos del Trámite: ') }}{{ $tramite -> nombre_tramite }}
                            </span>

                             <!--<div class="float-right">
                                <a href="{{ route('requisito-tramites.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>-->
                            <a href="{{ route('tramites.index') }}" class="btn btn-danger">
                                {{ __('Volver atrás') }}
                            </a>


                            <!-- Botón que abre el modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                            {{ __('Agregar requisito') }}
                            </button>

                            <!-- Modal de creación -->
                            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createModalLabel">{{ __('Create New Requisito Tramite') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="{{ route('requisito-tramites.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    @include('requisito-tramite.formview')
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
										<th>Nombre Requisito</th>
										<th>Descripcion Requisito</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisitoTramites as $requisitoTramite)
                                        <tr>
											<td>{{ $requisitoTramite->Id_requisito }}</td>
											<td>{{ $requisitoTramite->nombre_requisito }}</td>
											<td>{{ $requisitoTramite->descripcion_requisito }}</td>
											<td>
                                                {{ $requisitoTramite->estado == 1 ? 'Activo' : 'Inactivo' }}
                                            </td>
                                            <td>
                                            <!-- Botón para cambiar el estado con modal de confirmación -->
                                            <button type="button" class="btn btn-sm btn-{{ $requisitoTramite->estado == 1 ? 'danger' : 'success' }}" data-toggle="modal" data-target="#confirmChangeState{{ $requisitoTramite->Id_requisito }}">
                                                <i class="fa fa-fw fa-power-off"></i>
                                                {{ $requisitoTramite->estado == 1 ? 'Desactivar' : 'Activar' }}
                                            </button>

                                            <!-- Modal de confirmación para cambiar el estado -->
                                            <div class="modal fade" id="confirmChangeState{{ $requisitoTramite->Id_requisito }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <form action="{{ route('requisito-tramites.cambiarEstado', $requisitoTramite->Id_requisito) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-{{ $requisitoTramite->estado == 1 ? 'success' : 'danger' }}">
                                                                    Confirmar Cambio de Estado
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn btn-sm btn-success" href="{{ route('requisito-tramites.edit', $requisitoTramite->Id_requisito) }}">
                                                <i class="fa fa-fw fa-edit"></i> Editar
                                            </a>
                                            <!-- Otros botones de acciones -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $requisitoTramites->links() !!}
            </div>
        </div>
    </div>

@endsection

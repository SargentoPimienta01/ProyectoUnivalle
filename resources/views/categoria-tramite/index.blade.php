@extends('adminlte::page')

@section('template_title')
    Categoria Tramite
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categoria Tramite') }}
                            </span>

                             <!--<div class="float-right">
                                <a href="{{ route('categoria-tramites.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nueva categoría') }}
                                </a>
                              </div>-->
                              <!-- Botón para abrir el modal de creación -->
                            <div class="float-right">
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#createCategoriaTramiteModal">
                                    Crear nueva categoría
                                </button>
                            </div>

                            <!-- Modal de creación -->
                            <div class="modal fade" id="createCategoriaTramiteModal" tabindex="-1" role="dialog" aria-labelledby="createCategoriaTramiteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createCategoriaTramiteModalLabel">Crear nueva categoría de trámites</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Aquí incluye el formulario de creación de categoría de trámites -->
                                            <form method="POST" action="{{ route('categoria-tramites.store') }}" role="form" enctype="multipart/form-data">
                                                @csrf
                                                @include('categoria-tramite.form')
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
										<th>Nombre Categoria</th>
										<th>Estado</th>
										<!--<th>Id Area</th>
                                        <th></th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriaTramites as $categoriaTramite)
                                        <tr>
											<td>{{ $categoriaTramite->id_categoria_tramites }}</td>
											<td>{{ $categoriaTramite->nombre_categoria }}</td>
											<td>
                                                <button class="btn btn-sm btn-{{ $categoriaTramite->estado == 1 ? 'danger' : 'success' }}" data-toggle="modal" data-target="#confirmChangeState{{ $categoriaTramite->id_categoria_tramites }}">
                                                    <i class="fa fa-fw fa-power-off"></i>
                                                    {{ $categoriaTramite->estado == 1 ? 'Desactivar' : 'Activar' }}
                                                </button>
                                            </td>
                                            <!-- Modal de Confirmación para Cambio de Estado -->
                                            <div class="modal fade" id="confirmChangeState{{ $categoriaTramite->id_categoria_tramites }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Está seguro de que desea {{ $categoriaTramite->estado == 1 ? 'desactivar' : 'activar' }} esta categoría de trámites?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('categoria-tramites.cambiarEstado', $categoriaTramite->id_categoria_tramites) }}" method="POST">
                                                                @csrf
                                                                @method('PUT') <!-- Agrega este campo oculto para indicar una solicitud PUT -->
                                                                <button type="submit" class="btn btn-{{ $categoriaTramite->estado == 1 ? 'danger' : 'success' }}">
                                                                    Confirmar Cambio de Estado
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

											<!--<td>{{ $categoriaTramite->Id_area }}</td>-->
                                            <td>
                                                    <!--<a class="btn btn-sm btn-primary " href="{{ route('categoria-tramites.show',$categoriaTramite->id_categoria_tramites) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>-->
                                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#editModal{{ $categoriaTramite->id_categoria_tramites }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Cambiar nombre') }}
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal{{ $categoriaTramite->id_categoria_tramites }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel">{{ __('Edit Categoria Tramite') }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{ route('categoria-tramites.update', $categoriaTramite->id_categoria_tramites) }}"  role="form" enctype="multipart/form-data">
                                                                        {{ method_field('PATCH') }}
                                                                        @csrf
                                                                        @include('categoria-tramite.form')
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
                {!! $categoriaTramites->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('adminlte::page')
@extends('layouts.jquery')

@section('template_title')
    Tramite
@endsection

@section('content')
<div class="card-body">
    <div class="mb-3">
        <form action="{{ route('tramites.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
                @if($search)
                    <div class="input-group-append">
                        <a href="{{ route('tramites.index') }}" class="btn btn-outline-danger">Limpiar</a>
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
                            {{ __('Trámites') }}
                        </span>
                        <a href="{{ route('tramites.inactivos') }}" class="btn btn-secondary">
                            {{ __('Ir a Trámites inactivos') }}
                        </a>
                        <a href="{{ route('admin') }}" class="btn btn-danger">
                            {{ __('Volver atrás') }}
                        </a>
                         <div class="float-right">
                            <a href="{{ route('tramites.create') }}" class="btn btn-primary float-right"  data-placement="left">
                              {{ __('Crear nuevo trámite') }}
                            </a>
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
                                    
                                    <th>Nombre Tramite</th>
                                    <th>Duracion Tramite</th>
                                    <th>Categoria de Tramite</th>
                                    <th>Ubicación</th>
                                    <th>Estado</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tramites as $tramite)
                                    <tr>
                                        
                                        <td>{{ $tramite->Id_tramite }}</td>
                                        <td>{{ $tramite->nombre_tramite }}</td>
                                        <td>{{ $tramite->duracion_tramite }}</td>
                                        <!--<td>{{ $tramite->id_categoria_tramites }}</td>-->
                                        <td>{{ $tramite->categoriaTramite->nombre_categoria }}</td>
                                        <td>{{ $tramite->ubicacion->nombre_ubicacion }}</td>
                                        <td>
                                            {{ $tramite->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </td>

                                        <td>
                                            <form action="{{ route('tramites.destroy', $tramite->Id_tramite) }}" method="POST">
                                                <!--<a class="btn btn-sm btn-primary" href="{{ route('tramites.show', $tramite->Id_tramite) }}">
                                                    <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                </a>-->
                                                <a class="btn btn-sm btn-success" href="{{ route('tramites.edit', $tramite->Id_tramite) }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ __('Modificar') }}
                                                </a>
                                                <a class="btn btn-sm btn-secondary" href="{{ url('tramites/requisito-tramites/' . $tramite->Id_tramite) }}">
                                                    <i class="fa fa-fw fa-exchange"></i> {{ __('Administrar requisitos') }}
                                                </a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $tramite->Id_tramite }}">
                                                    <i class="fa fa-fw fa-exchange"></i> {{ __('Cambiar Estado') }}
                                                </button>
                                            </form>
                                        </td>

                                        <!-- Modal de Confirmación para Cambio de Estado -->
                                        <div class="modal fade" id="confirmChangeState{{ $tramite->Id_tramite }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea cambiar el estado de este trámite?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('tramites.cambiarEstado', $tramite->Id_tramite) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning">Confirmar Cambio de Estado</button>
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
            {!! $tramites->links() !!}
        </div>
    </div>
</div>
@endsection

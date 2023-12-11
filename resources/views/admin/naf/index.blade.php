@extends('adminlte::page')

@section('template_title')
    Naf
@endsection
@section('title', 'Admin | NAF')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
<div class="container py-1">
        <h2>Listado de Servicios de Núcleo de Apoyo Financiero</h2>
</div>
<div class="card-body">
    <div class="mb-3">
        <form action="{{ route('nafs.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
                @if($search)
                    <div class="input-group-append">
                        <a href="{{ route('nafs.index') }}" class="btn btn-outline-danger">Limpiar</a>
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
                                {{ __('Naf') }}
                            </span>

                            <a class="btn btn-secondary" href="{{ route('nafs.inactivos') }}">
                                {{ __('Ir a NAFs Inactivos') }}
                            </a>

                             <div class="float-right">
                                <a href="{{ route('nafs.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Agregar Servicio') }}
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
										<th>Servicio</th>
										<th>Ubicación</th>
                                        <th>Descripción</th>
										<th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nafs as $naf)
                                        <tr>                                            
											<td>{{ $naf->Id_naf }}</td>
											<td>{{ $naf->nombre_naf }}</td>
											<td>{{ $naf->ubicacion->nombre_ubicacion }}</td>
                                            <td>
                                                @if($naf->descripcion === null)
                                                    <span style="color: red;">Nulo</span>
                                                @else
                                                    {{ $naf->descripcion }}
                                                @endif
                                            </td>
											<td>{{ $naf->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-secondary" href="{{ url('nafs/requisitos-naf/' . $naf->Id_naf) }}">
                                                    <i class="fas fa-tasks"></i> {{ __('Administrar requisitos') }}
                                                </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('nafs.edit',$naf->Id_naf) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $naf->id }}">
                                                    <i class="fa fa-fw fa-power-off"></i> {{ __('Cambiar Estado') }}
                                                </button>

                                                <!-- Modal de Confirmación para Cambio de Estado -->
                                                <div class="modal fade" id="confirmChangeState{{ $naf->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ¿Está seguro de que desea cambiar el estado de este Naf?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                <form method="POST" action="{{ route('nafs.cambiarEstado', $naf->Id_naf) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-warning btn-sm">
                                                                        <i class="fa fa-fw fa-exchange"></i> {{ __('Cambiar Estado') }}
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
                {!! $nafs->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('adminlte::page')

@section('template_title')
    Caja
@endsection
@section('title', 'Admin | Cajas')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
<div class="container py-1">
        <h2>Listado de Cajas</h2>
</div>
<div class="card-body">
    <div class="mb-3">
        <form action="{{ route('cajas.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
                @if($search)
                    <div class="input-group-append">
                        <a href="{{ route('cajas.index') }}" class="btn btn-outline-danger">Limpiar</a>
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
                                {{ __('Cajas') }}
                            </span>

                            <a href="{{ route('cajas.index', ['latestFirst' => !$latestFirst]) }}" class="btn btn-info">
                                @if($latestFirst) Ordenar Asc @else Ordenar Desc @endif<i class="fa fa-sort"></i>
                            </a>


                            <a class="btn btn-secondary" href="{{ route('cajas.inactivas') }}">
                                {{ __('Ir a Cajas Inactivas') }}
                            </a>

                            <div class="float-right">
                                <a href="{{ route('cajas.create') }}" class="btn btn-primary float-right" data-placement="left">
                                  {{ __('Crear Nueva Caja') }}
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
                                        <th>Nombre Caja</th>
                                        <th>Descripcion Caja</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cajas as $caja)
                                        <tr>
                                            <td>{{ $caja->Id_caja }}</td>
                                            <td>{{ $caja->nombre_caja }}</td>
                                            <td>{{ $caja->descripcion_caja }}</td>
                                            <td>
                                                @if ($caja->estado == 1)
                                                    Activo
                                                @else
                                                    Inactivo
                                                @endif
                                            </td>
                                            <!--<td>{{ $caja->area->nombre_area }}</td>-->
                                            <td>
                                                <!--<form action="{{ route('cajas.destroy', $caja->Id_caja) }}" method="POST">-->
                                                    <!--<a class="btn btn-sm btn-primary" href="{{ route('cajas.show', $caja->Id_caja) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>-->
                                                    <a class="btn btn-sm btn-success" href="{{ route('cajas.edit', $caja->Id_caja) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <!--<button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                    </button>-->

                                                    <a class="btn btn-sm btn-secondary" href="{{ route('cajas.requisitos.index', ['id_caja' => $caja->Id_caja]) }}">
                                                        <i class="fas fa-tasks"></i> {{ __('Administrar Requisitos') }}
                                                    </a>


                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $caja->Id_caja }}">
                                                        <i class="fa fa-fw fa-power-off"></i> {{ __('Cambiar Estado') }}
                                                    </button>

                                                    <!-- Modal de Confirmación para Cambio de Estado -->
                                                    <div class="modal fade" id="confirmChangeState{{ $caja->Id_caja }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ¿Está seguro de que desea cambiar el estado de esta caja?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <form method="POST" action="{{ route('cajas.cambiarEstado', $caja->Id_caja) }}">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit" class="btn btn-warning">
                                                                            {{('Cambiar Estado') }}
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                <!--</form>-->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cajas->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection

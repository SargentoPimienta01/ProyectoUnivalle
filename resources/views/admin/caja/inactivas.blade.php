@extends('adminlte::page')

@section('template_title')
    Caja
@endsection
@section('title', 'Univalle | Cajas inactivas')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
<div class="container py-1">
        <h2>Listado de Cajas Inactivas</h2>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Caja') }}
                            </span>
                            <!--<div class="float-right">
                                <a href="{{ route('cajas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                  {{ __('Crear Nueva Caja') }}
                                </a>
                            </div>-->
                            <a href="{{ route('cajas.index') }}" class="btn btn-danger">
                            {{ __('Volver a Cajas') }}
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
                                            <td>
                                                <!--<form action="{{ route('cajas.destroy', $caja->Id_caja) }}" method="POST">-->
                                                    <!--<a class="btn btn-sm btn-primary" href="{{ route('cajas.show', $caja->Id_caja) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>-->
                                                    <!--<a class="btn btn-sm btn-success" href="{{ route('cajas.edit', $caja->Id_caja) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Modificar') }}
                                                    </a>-->
                                                    @csrf
                                                    @method('DELETE')
                                                    <!--<button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                    </button>-->
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
                        {{ ('Cambiar Estado') }}
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

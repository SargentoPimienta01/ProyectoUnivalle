@extends('adminlte::page')

@section('template_title')
    Postgrado
@endsection
@section('title', 'Admin | Postgrados')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
<div class="container py-1">
        <h2>Listado de Postgrados</h2>
</div>

<div class="card-body">
    <div class="mb-3">
        <form action="{{ route('postgrados.index') }}" method="GET">
        <div class="form-group mr-2">
                <label for="categoria" class="mr-2">Filtar por categoría:</label>
                <select class="form-control" name="categoria" id="categoria">
                    <option value="">Todas las categorías</option>
                    <option value="diplomado">Diplomados</option>
                    <option value="doctorado">Doctorados</option>
                    <option value="maestria">Maestrías</option>
                </select>
            </div>
            <label for="categoria" class="mr-2">Buscar:</label>
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
                @if($search)
                    <div class="input-group-append">
                        <a href="{{ route('postgrados.index') }}" class="btn btn-outline-danger">Limpiar</a>
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
                                {{ __('Postgrado') }}
                            </span>

                            <a href="{{ route('postgrados.index', ['latestFirst' => !$latestFirst]) }}" class="btn btn-info">
                                @if($latestFirst) Ordenar Asc @else Ordenar Desc @endif<i class="fa fa-sort"></i>
                            </a>

                            <a href="{{ route('postgrados.inactivos') }}" class="btn btn-secondary">
                                {{ __('Ir a postgrados inactivos') }}
                            </a>

                             <div class="float-right">
                                <a href="{{ route('postgrados.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Agregar') }}
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
										<th>Nombre Programa</th>
										<th>Descripcion</th>
										<th>Modalidad</th>
										<th>Categoria</th>
										<th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postgrados as $postgrado)
                                        <tr>
											<td>{{ $postgrado->Id_postgrado }}</td>
											<td>{{ $postgrado->nombre_programa }}</td>
											<td>{{ $postgrado->descripcion }}</td>
											<td>{{ $postgrado->modalidad }}</td>
											<td>{{ $postgrado->categoria }}</td>
											<td>
                                                @if ($postgrado->estado == 1)
                                                    Activo
                                                @else
                                                    Inactivo
                                                @endif
                                            </td>
                                            <td>
                                                <!--<form action="{{ route('postgrados.destroy',$postgrado->Id_postgrado) }}" method="POST">-->
                                                    <!--<a class="btn btn-sm btn-primary " href="{{ route('postgrados.show',$postgrado->Id_postgrado) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>-->
                                                    <a class="btn btn-sm btn-success" href="{{ route('postgrados.edit',$postgrado->Id_postgrado) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    <!--@csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>-->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $postgrado->Id_postgrado }}">
                                                    <i class="fa fa-fw fa-power-off"></i> {{ __('Cambiar Estado') }}
                                                </button>
                                               <!-- Modal de Confirmación para Cambio de Estado -->
                                        <div class="modal fade" id="confirmChangeState{{ $postgrado->Id_postgrado }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea cambiar el estado de esta carrera?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('postgrados.cambiarEstado', $postgrado->Id_postgrado) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning">Confirmar Cambio de Estado</button>
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
                {!! $postgrados->links() !!}
            </div>
        </div>
    </div>
@endsection

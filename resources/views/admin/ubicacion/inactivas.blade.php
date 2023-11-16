@extends('adminlte::page')
@extends('layouts.jquery')

@section('template_title')
    Ubicacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ubicaciones') }}
                            </span>

                            <a href="{{ route('ubicacion.index') }}" class="btn btn-danger">
                                {{ __('Volver a Ubicaciones Activas') }}
                            </a>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.ubicacion.inactivas') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Buscar ubicaciones" name="search" value="{{ $search }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                            </div>
                            @if($search)
                                <div class="input-group-append">
                                    <a href="{{ route('admin.ubicacion.inactivas') }}" class="btn btn-outline-danger">Limpiar</a>
                                </div>
                            @endif
                        </div>
                    </form>


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
                                        <th>No</th>
                                        
										<th>Nombre Ubicacion</th>
										<th>Edificio</th>
										<th>Planta</th>
										<th>Horario</th>
										<th>Detalles Direccion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ubicacionesInactivas as $ubicacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ubicacion->nombre_ubicacion }}</td>
											<td>{{ $ubicacion->edificio }}</td>
											<td>
                                            @if ($ubicacion->planta == 0)
                                                Planta baja
                                            @else
                                                {{ $ubicacion->planta }}
                                            @endif
                                        </td>
											<td>{{ $ubicacion->horario }}</td>
											<td>{{ $ubicacion->detalles_direccion }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('ubicacion.show',$ubicacion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('ubicacion.edit',$ubicacion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Modificar') }}</a>
                                                <!-- Botón para cambiar el estado con modal de confirmación -->
    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirmModal{{ $ubicacion->id }}">
        <i class="fa fa-fw fa-toggle-on"></i> {{ __('Cambiar Estado') }}
    </button>
    
    <!-- Modal de confirmación -->
    <div class="modal fade" id="confirmModal{{ $ubicacion->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Cambio de Estado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que quieres cambiar el estado de esta ubicación?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="{{ route('ubicacion.toggleEstado', $ubicacion->id) }}" class="btn btn-danger">Confirmar</a>
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
                {!! $ubicacionesInactivas->links() !!}
            </div>
        </div>
    </div>
@endsection

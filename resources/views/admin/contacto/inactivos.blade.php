@extends('adminlte::page')

@section('template_title')
    Contacto
@endsection
@section('title', 'Admin | Contactos inactivos')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Contactos') }}
                            </span>

                            <a class="btn btn-danger" href="{{ route('contactos.index') }}">
                                {{ __('Volver a contactos') }}
                            </a>

                             <!--<div class="float-right">
                                <a href="{{ route('contactos.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Agregar') }}
                                </a>
                              </div>-->
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
                                        <th>No</th>
                                        
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Celular Trabajo</th>
										<th>Correo Institucional</th>
										<th>Área Responsable</th>
                                        <th>Estado</th>
										<th>Id Usuario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contactos as $contacto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $contacto->nombres }}</td>
											<td>{{ $contacto->apellidos }}</td>
											<td>{{ $contacto->celular_trabajo }}</td>
											<td>{{ $contacto->correo_institucional }}</td>
											<td>{{ $contacto->area_responsable }}</td>
                                            <td>
                                                @if ($contacto->estado == 1) Activo @else Inactivo @endif
                                            </td>
											<td>{{ $contacto->id_usuario ? $contacto->id_usuario : 'Sin usuario asignado' }}</td>

                                            <td>
                                                <!--<a class="btn btn-sm btn-success" href="{{ route('contactos.edit',$contacto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>-->
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $contacto->id }}">
                                                    <i class="fa fa-fw fa-power-off"></i> {{ __('Activar') }}
                                                </button>

<!-- Modal de Confirmación para Cambio de Estado -->
<div class="modal fade" id="confirmChangeState{{ $contacto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea cambiar el estado de este contacto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{ route('contactos.cambiarEstado', $contacto->id) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning">
                        {{ __('Cambiar Estado') }}
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
                {!! $contactos->links() !!}
            </div>
        </div>
    </div>
@endsection

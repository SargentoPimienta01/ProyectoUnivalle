@extends('adminlte::page')

@section('template_title')
    Plataforma De Atencion
@endsection
@section('title', 'Admin | Plataforma de atención inactivos')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
<div class="container py-1">
        <h2>Plataforma de Atención - servicios</h2>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Plataforma De Atencion') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('plataforma-de-atencions.index') }}" class="btn btn-danger float-right"  data-placement="left">
                                  {{ __('Volver a Servicios de Plataforma de atención') }}
                                </a>
                            </div>

                             <!--<div class="float-right">
                                <a href="{{ route('plataforma-de-atencions.create') }}" class="btn btn-primary float-right"  data-placement="left">
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
										<th>Id</th>
										<th>Servicio</th>
										<th>Descripcion</th>
                                        <th>Requisitos</th>
										<th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plataformaDeAtencions as $plataformaDeAtencion)
                                        <tr>
											<td>{{ $plataformaDeAtencion->Id_plataforma_de_atencion }}</td>
											<td>{{ $plataformaDeAtencion->servicio }}</td>
											<td>{{ $plataformaDeAtencion->descripcion }}</td>
                                            <td>{{ $plataformaDeAtencion->requisitos }}</td>
											<td>
                                                @if ($plataformaDeAtencion->estado == 1)
                                                    Activo
                                                @else
                                                    Inactivo
                                                @endif
                                            </td>
                                            <td>
                                                <!--<form action="{{ route('plataforma-de-atencions.destroy',$plataformaDeAtencion->Id_plataforma_de_atencion) }}" method="POST">-->
                                                    <!--<a class="btn btn-sm btn-primary " href="{{ route('plataforma-de-atencions.show',$plataformaDeAtencion->Id_plataforma_de_atencion) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>-->
                                                    <a class="btn btn-sm btn-success" href="{{ route('plataforma-de-atencions.edit',$plataformaDeAtencion->Id_plataforma_de_atencion) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    <!--@csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>-->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $plataformaDeAtencion->Id_plataforma_de_atencion }}">
                                                    <i class="fa fa-fw fa-power-off"></i> {{ __('Cambiar Estado') }}
                                                </button>
                                               <!-- Modal de Confirmación para Cambio de Estado -->
                                        <div class="modal fade" id="confirmChangeState{{ $plataformaDeAtencion->Id_plataforma_de_atencion }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <form action="{{ route('plataforma-de-atencions.cambiarEstado', $plataformaDeAtencion->Id_plataforma_de_atencion) }}" method="POST">
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
                {!! $plataformaDeAtencions->links() !!}
            </div>
        </div>
    </div>
@endsection

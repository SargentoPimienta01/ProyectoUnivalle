@extends('adminlte::page')

@section('template_title')
    Campus
@endsection
@section('title', 'Admin | Anuncios de Campus Deportivo')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
<div class="container py-1">
        <h2>Anuncios de Campus deportivo</h2>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Campus') }}
                            </span>
                            @if(auth()->user()->hasRole('Admin'))
                            <a href="{{ route('campuses.inactivos') }}" class="btn btn-secondary">
                                {{ __('Ir a Anuncios inactivos') }}
                            </a>
                            @endif

                             <div class="float-right">
                                <a href="{{ route('campuses.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if (session('success'))
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            Swal.fire({
                                title: 'Éxito',
                                text: '{{ session('success') }}',
                                icon: 'success'
                            });
                        </script>
                        @endif
                        @if (session('error'))
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                Swal.fire({
                                    title: 'Error!',
                                    text: '{{ session('error') }}',
                                    icon: 'error'
                                });
                            </script>
                        @endif
                        @if (session('fail'))
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                Swal.fire({
                                    title: 'Error!',
                                    text: '{{ session('fail') }}',
                                    icon: 'error'
                                });
                            </script>
                        @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Hora</th>
										<th>Fecha</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campuses as $campus)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $campus->nombre }}</td>
											<td>{{ $campus->hora }}</td>
											<td>{{ $campus->fecha }}</td>
											<td>
                                                @if ($campus->estado == 1)
                                                    Activo
                                                @else
                                                    Inactivo
                                                @endif
                                            </td>

                                            <td>
                                                <!--<form action="{{ route('campuses.destroy',$campus->id) }}" method="POST">-->
                                                    <!--<a class="btn btn-sm btn-primary " href="{{ route('campuses.show',$campus->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>-->
                                                    <a class="btn btn-sm btn-success" href="{{ route('campuses.edit',$campus->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    <!--@csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>-->
                                                <!--</form>-->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $campus->id }}">
                                                    <i class="fa fa-fw fa-power-off"></i> {{ __('Cambiar Estado') }}
                                                </button>
                                                <!-- Modal de Confirmación para Cambio de Estado -->
                                            <div class="modal fade" id="confirmChangeState{{ $campus->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <form action="{{ route('campuses.cambiarEstado', $campus->id) }}" method="POST">
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
                {!! $campuses->links() !!}
            </div>
        </div>
    </div>
@endsection

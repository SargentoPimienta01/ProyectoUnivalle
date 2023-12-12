@extends('adminlte::page')
@extends('layouts.jquery')

@section('template_title')
    Requisito Tramite
@endsection
@section('title', 'Univalle | Requisitos de trámites')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
<div class="container py-1">
        <h2>Listado de {{ __('requisitos de trámite: ') }}{{ $tramite -> nombre_tramite }}</h2>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisitos del Trámite: ') }}{{ $tramite -> nombre_tramite }}
                            </span>
                            @if(auth()->user()->hasRole('Admin'))
                            <a href="{{ route('requisito-tramites.inactivos') }}" class="btn btn-secondary">
                                {{ __('Ir a Requisitos inactivos') }}
                            </a>
                            @endif
                             <!--<div class="float-right">
                                <a href="{{ route('requisito-tramites.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>-->
                            <a href="{{ route('tramites.index') }}" class="btn btn-danger">
                                {{ __('Volver a trámites') }}
                            </a>


                            <!-- Botón que abre el modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                            {{ __('Agregar requisito') }}
                            </button>

                            <!-- Modal de creación -->
                            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createModalLabel">{{ __('Agregar requisito') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="{{ route('requisito-tramites.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    @include('admin.tramite.requisito-tramite.formview')
                                </form>
                                </div>
                                </div>
                            </div>
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
										<th>Id</th>
										<th>Nombre Requisito</th>
										<th>Descripcion Requisito</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisitoTramites as $requisitoTramite)
                                        <tr>
											<td>{{ $requisitoTramite->Id_requisito }}</td>
											<td>{{ $requisitoTramite->nombre_requisito }}</td>
											<td>{{ $requisitoTramite->descripcion_requisito }}</td>
											<td>
                                                {{ $requisitoTramite->estado == 1 ? 'Activo' : 'Inactivo' }}
                                            </td>
                                            <td>
                                            <!-- Botón para cambiar el estado con modal de confirmación -->
                                            <button type="button" class="btn btn-sm btn-{{ $requisitoTramite->estado == 1 ? 'danger' : 'success' }}" data-toggle="modal" data-target="#confirmChangeState{{ $requisitoTramite->Id_requisito }}">
                                                <i class="fa fa-fw fa-power-off"></i>
                                                {{ $requisitoTramite->estado == 1 ? 'Desactivar' : 'Activar' }}
                                            </button>

                                            <!-- Modal de confirmación para cambiar el estado -->
                                            <div class="modal fade" id="confirmChangeState{{ $requisitoTramite->Id_requisito }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Está seguro de que desea cambiar el estado de este requisito?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('requisito-tramites.cambiarEstado', $requisitoTramite->Id_requisito) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-{{ $requisitoTramite->estado == 1 ? 'success' : 'danger' }}">
                                                                    Confirmar Cambio de Estado
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<a class="btn btn-sm btn-success" href="{{ route('requisito-tramites.edit', $requisitoTramite->Id_requisito) }}">
                                                <i class="fa fa-fw fa-edit"></i> Editar
                                            </a>-->
                                            <!--
                                            <a class="btn btn-sm btn-success" href="{{ route('requisito-tramites.edit', $requisitoTramite->Id_requisito) }}">
                                                <i class="fa fa-fw fa-edit"></i> Editar
                                            </a>-->
                                                <td>
                                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#editModal{{ $requisitoTramite->Id_requisito }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal{{ $requisitoTramite->Id_requisito }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel">{{ __('Editar requisito de trámite') }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <form method="POST" action="{{ route('requisito-tramites.update', $requisitoTramite->Id_requisito) }}" role="form" enctype="multipart/form-data">
                                                                {{ method_field('PATCH') }}
                                                                    @csrf
                                                                    @include('admin.tramite.requisito-tramite.form')
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
                {!! $requisitoTramites->links() !!}
            </div>
        </div>
    </div>

@endsection

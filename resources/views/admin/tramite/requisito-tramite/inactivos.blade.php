@extends('adminlte::page')
@extends('layouts.jquery')

@section('template_title')
    Requisito Tramite
@endsection
@section('title', 'Univalle | Requisitos inactivos de trámites')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisitos de Trámite Inactivos: ') }}
                            </span>

                             <!--<div class="float-right">
                                <a href="{{ route('requisito-tramites.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>-->
                            <a href="{{ route('tramites.index') }}" class="btn btn-danger">
                                {{ __('Volver a trámites') }}
                            </a>


                            <!-- Botón que abre el modal -->
                            <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                            {{ __('Agregar requisito') }}
                            </button>-->

                           
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
                                    @foreach ($requisitosInactivos as $requisitoInactivo)
                                        <tr>
											<td>{{ $requisitoInactivo->Id_requisito }}</td>
											<td>{{ $requisitoInactivo->nombre_requisito }}</td>
											<td>{{ $requisitoInactivo->descripcion_requisito }}</td>
											<td>
                                                {{ $requisitoInactivo->estado == 1 ? 'Activo' : 'Inactivo' }}
                                            </td>
                                            <td>
                                            <!-- Botón para cambiar el estado con modal de confirmación -->
                                            <button type="button" class="btn btn-sm btn-{{ $requisitoInactivo->estado == 1 ? 'danger' : 'success' }}" data-toggle="modal" data-target="#confirmChangeState{{ $requisitoInactivo->Id_requisito }}">
                                                <i class="fa fa-fw fa-power-off"></i>
                                                {{ $requisitoInactivo->estado == 1 ? 'Desactivar' : 'Activar' }}
                                            </button>

                                            <!-- Modal de confirmación para cambiar el estado -->
                                            <div class="modal fade" id="confirmChangeState{{ $requisitoInactivo->Id_requisito }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <form action="{{ route('requisito-tramites.cambiarEstado', $requisitoInactivo->Id_requisito) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-{{ $requisitoInactivo->estado == 1 ? 'success' : 'danger' }}">
                                                                    Confirmar Cambio de Estado
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<a class="btn btn-sm btn-success" href="{{ route('requisito-tramites.edit', $requisitoInactivo->Id_requisito) }}">
                                                <i class="fa fa-fw fa-edit"></i> Editar
                                            </a>-->
                                            <!-- Otros botones de acciones -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $requisitosInactivos->links() !!}
            </div>
        </div>
    </div>

@endsection

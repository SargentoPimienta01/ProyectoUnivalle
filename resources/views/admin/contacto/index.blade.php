@extends('adminlte::page')

@section('template_title')
    Contacto
@endsection
@section('title', 'Admin | Contactos')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
<div class="container py-1">
        <h2>Listado de Contactos</h2>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Contactos') }}
                            </span>
                            @if(auth()->user()->hasRole('Admin'))
                            <a class="btn btn-secondary" href="{{ route('contactos.inactivos') }}">
                                {{ __('Ir a contactos inactivos') }}
                            </a>
                            @endif

                             <div class="float-right">
                                <a href="{{ route('contactos.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Agregar') }}
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
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" id="searchInput"  class="form-control" placeholder="Escriba para filtrar área por nombre o descripción...">
                        </div>
                    </div>
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
										<!--<th>Id Usuario</th>-->

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
											<td>{{ $contacto->area->nombre_area }}</td>
                                            <td>
                                                @if ($contacto->estado == 1) Activo @else Inactivo @endif
                                            </td>
											<!--<td>{{ $contacto->id_usuario ? $contacto->id_usuario : 'Sin usuario asignado' }}</td>-->

                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{ route('contactos.edit',$contacto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $contacto->id }}">
                                                    <i class="fa fa-fw fa-power-off"></i> {{ __('Eliminar') }}
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
                        <!-- Agrega el script de JavaScript al final del archivo -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Función para filtrar las filas de la tabla según la búsqueda
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
                    </div>
                </div>
                {!! $contactos->links() !!}
            </div>
        </div>
    </div>
@endsection

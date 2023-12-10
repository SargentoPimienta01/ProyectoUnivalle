@extends('adminlte::page')

@section('template_title')
    Área
@endsection
@section('title', 'Admin | Áreas')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
<div class="container py-1">
        <h2>Listado de Áreas</h2>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Área') }}
                            </span>

                             <!--<div class="float-right">
                                <a href="{{ route('areas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>-->
                            <!--<div class="float-right">
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#createAreaModal">
                                    Crear nueva área
                                </button>
                            </div>-->
                            <!-- Modal de creación de área -->
                            <!--<div class="modal fade" id="createAreaModal" tabindex="-1" role="dialog" aria-labelledby="createAreaModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createAreaModalLabel">Crear nueva área</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('areas.store') }}" role="form" enctype="multipart/form-data">
                                                @csrf
                                                @include('admin.area.form')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>-->


                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                  
    <div class="card-body">
    <div class="mb-3">
        <div class="input-group">
            <input type="text" name="search" id="searchInput"  class="form-control" placeholder="Escriba para filtrar área por nombre o descripción...">
        </div>
    </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <!-- Encabezado de la tabla -->
                <thead class="thead">
                    <tr>                                      
                        <th>Id</th>
                        <th>Nombre de Área</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla -->
                <tbody>
                    @foreach ($areas as $area)
                        <tr>                                          
                            <td>{{ $area->Id_area }}</td>
                            <td>{{ $area->nombre_area }}</td>
                            <td>{{ $area->descripcion }}</td>
                            <td>{{ $area->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                            <td>
                            <td>
                                                <!--<form action="{{ route('areas.destroy',$area->Id_area) }}" method="POST">
                                                    <a class="btn btn-sm btn-success " href="{{ route('areas.show',$area->Id_area) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('areas.edit',$area->Id_area) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>-->
                                                <button class="btn btn-sm btn-{{ $area->estado == 1 ? 'danger' : 'success' }}" data-toggle="modal" data-target="#changeAreaStateModal{{ $area->Id_area }}">
                                                    <i class="fa fa-fw fa-power-off"></i>
                                                    {{ $area->estado == 1 ? 'Desactivar' : 'Activar' }}
                                                </button>

                                                <!-- Modal de cambio de estado de área -->
                                                <div class="modal fade" id="changeAreaStateModal{{ $area->Id_area }}" tabindex="-1" role="dialog" aria-labelledby="changeAreaStateModalLabel{{ $area->Id_area }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="changeAreaStateModalLabel{{ $area->Id_area }}">
                                                                    Confirmar Cambio de Estado
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ¿Está seguro de que desea {{ $area->estado == 1 ? 'desactivar' : 'activar' }} esta área?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                <form action="{{ route('areas.cambiarEstado', $area->Id_area) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-{{ $area->estado == 1 ? 'danger' : 'success' }}">
                                                                        Confirmar Cambio de Estado
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--<a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#editAreaModal{{ $area->Id_area }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                </a>-->
                                                <!-- Modal de edición de área -->
                                                <!--<div class="modal fade" id="editAreaModal{{ $area->Id_area }}" tabindex="-1" role="dialog" aria-labelledby="editAreaModalLabel{{ $area->Id_area }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editAreaModalLabel{{ $area->Id_area }}">Editar área</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">-->
                                                                <!-- Formulario para editar el área -->
                                                                <!--<form method="POST" action="{{ route('areas.update', $area->Id_area) }}" role="form" enctype="multipart/form-data">
                                                                    {{ method_field('PATCH') }}
                                                                    @csrf
                                                                    @include('admin.area.form')
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                            
                                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $areas->links() !!}
            </div>
        </div>
    </div>
@endsection

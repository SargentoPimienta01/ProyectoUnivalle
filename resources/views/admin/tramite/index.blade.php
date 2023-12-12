@extends('adminlte::page')
@extends('layouts.jquery')

@section('template_title')
    Tramite
@endsection
@section('title', 'Admin | Trámites')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
<div class="container py-1">
        <h2>Listado de Trámites</h2>
</div>
<div class="card-body">
    <div class="mb-3">
        <form action="{{ route('tramites.index') }}" method="GET">
        <div class="form-group mr-2">
                <label for="categoria" class="mr-2">Filtar por categoría:</label>
                <select class="form-control" name="categoria" id="categoria">
                    <option value="">Todas las categorías</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria_tramites }}" {{ $categoriaId == $categoria->id_categoria_tramites ? 'selected' : '' }}>
                            {{ $categoria->nombre_categoria }}
                        </option>
                    @endforeach
                </select>
            </div>
            <label for="categoria" class="mr-2">Buscar:</label>
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
                @if($search)
                    <div class="input-group-append">
                        <a href="{{ route('tramites.index') }}" class="btn btn-outline-danger">Limpiar</a>
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Aquí puedes mostrar la tabla de tramites -->


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Trámites') }}
                        </span>
                        <a href="{{ route('tramites.index', ['latestFirst' => !$latestFirst]) }}" class="btn btn-info">
                                @if($latestFirst) Ordenar Asc @else Ordenar Desc @endif<i class="fa fa-sort"></i>
                        </a>
                        @if(auth()->user()->hasRole('Admin'))
                        <a href="{{ route('tramites.inactivos') }}" class="btn btn-secondary">
                            {{ __('Ir a Trámites inactivos') }}
                        </a>
                        @endif
                        <!--<a href="{{ route('admin') }}" class="btn btn-danger">
                            {{ __('Volver') }}
                        </a>-->
                         <div class="float-right">
                            <a href="{{ route('tramites.create') }}" class="btn btn-primary float-right"  data-placement="left">
                              {{ __('Crear nuevo trámite') }}
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
                                    <th>Id</th>
                                    
                                    <th>Nombre Tramite</th>
                                    <th>Duracion Tramite</th>
                                    <th>Categoria de Tramite</th>
                                    <th>Ubicación</th>
                                    <th>Estado</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tramites as $tramite)
                                    <tr>
                                        
                                        <td>{{ $tramite->Id_tramite }}</td>
                                        <td>{{ $tramite->nombre_tramite }}</td>
                                        <td>{{ $tramite->duracion_tramite }}</td>
                                        <!--<td>{{ $tramite->id_categoria_tramites }}</td>-->
                                        <td>{{ $tramite->categoriaTramite->nombre_categoria }}</td>
                                        <td>{{ $tramite->ubicacion->nombre_ubicacion }}</td>
                                        <td>
                                            {{ $tramite->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </td>

                                        <td>
                                            <form action="{{ route('tramites.destroy', $tramite->Id_tramite) }}" method="POST">
                                                <!--<a class="btn btn-sm btn-primary" href="{{ route('tramites.show', $tramite->Id_tramite) }}">
                                                    <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                </a>-->
                                                <a class="btn btn-sm btn-success" href="{{ route('tramites.edit', $tramite->Id_tramite) }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                </a>
                                                <a class="btn btn-sm btn-secondary" href="{{ url('tramites/requisito-tramites/' . $tramite->Id_tramite) }}">
                                                    <i class="fas fa-tasks"></i> {{ __('Administrar requisitos') }}
                                                </a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $tramite->Id_tramite }}">
                                                    <i class="fa fa-fw fa-power-off"></i> {{ __('Cambiar Estado') }}
                                                </button>
                                            </form>
                                        </td>

                                        <!-- Modal de Confirmación para Cambio de Estado -->
                                        <div class="modal fade" id="confirmChangeState{{ $tramite->Id_tramite }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <form action="{{ route('tramites.cambiarEstado', $tramite->Id_tramite) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning">Confirmar Cambio de Estado</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $tramites->links() !!}
        </div>
    </div>
</div>
@endsection

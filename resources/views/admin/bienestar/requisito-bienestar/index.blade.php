@extends('adminlte::page')

<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
<head>
  <title>Admin | {{ $bienestar->servicio }}</title>
</head>
@section('content')
<div class="container py-1">
        <h2>{{ __('Bienestar: ') }}{{ $bienestar->servicio }}</h2>
</div>
<div class="card-body">
    <div class="mb-3">
        <form action="{{ route ('requisito-bienestares.index', ['id_bienestar' => $bienestar->id]) }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
                @if($search)
                    <div class="input-group-append">
                        <a href="{{ route ('requisito-bienestares.index', ['id_bienestar' => $bienestar->id]) }}" class="btn btn-outline-danger">Limpiar</a>
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
                                {{ __('Requisitos de Bienestar: ') }}{{ $bienestar->servicio }}
                            </span>

                            <a href="{{ route('requisito-bienestares.index', ['id_bienestar' => $bienestar->id, 'latestFirst' => !$latestFirst]) }}" class="btn btn-info">
                                @if($latestFirst) Ordenar Asc @else Ordenar Desc @endif<i class="fa fa-sort"></i>
                            </a>

                            <a href="{{ route('bienestar.index') }}" class="btn btn-danger">
                                {{ __('Volver a Bienestar') }}
                            </a>

                            <a href="{{ route('requisito-bienestares.inactivos') }}" class="btn btn-secondary">
                                {{ __('Ir a requisitos inactivos') }}
                            </a>

                            <!-- Botón que abre el modal -->
                            <a href="{{ route('requisito-bienestares.create', ['id_bienestar' => $bienestar->id]) }}" class="btn btn-primary float-right" data-placement="left">
                                {{ __('Agregar requisito') }}
                            </a>


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
                                        <th>Detalle</th>
                                        <th>Requisitos</th>
                                        <th>Horarios</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($requisitosBienestar as $requisitoBienestar)
                                    <tr>
                                        <td>{{ $requisitoBienestar->id }}</td>
                                        <td>{{ $requisitoBienestar->servicio }}</td>
                                        <td>{{ $requisitoBienestar->detalle }}</td>
                                        <td>{{ $requisitoBienestar->requisitos }}</td>
                                        <td>{{ $requisitoBienestar->horarios }}</td>
                                        <td>
                                            {{ $requisitoBienestar->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('requisito-bienestares.edit', ['id_bienestar' => $requisitoBienestar->Id_bienestar, 'id' => $requisitoBienestar->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i>Editar</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmChangeState{{ $requisitoBienestar->id }}">
                                            <i class="fa fa-fw fa-power-off"></i>Cambiar Estado
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                <!-- Modal de Confirmación para Cambio de Estado -->
                                @foreach ($requisitosBienestar as $requisitoBienestar)
                                    <div class="modal fade" id="confirmChangeState{{ $requisitoBienestar->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <form action="{{ route('requisito-bienestares.cambiarEstado', $requisitoBienestar->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning">Confirmar Cambio de Estado</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $requisitosBienestar->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('adminlte::page')

@section('title', 'Requisitos de Bienestar')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisitos de Bienestar: ') }}{{ $bienestar->nombre_bienestar }}
                            </span>

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
                                            <a href="{{ route('requisito-bienestares.edit', ['id_bienestar' => $requisitoBienestar->Id_bienestar, 'id' => $requisitoBienestar->id]) }}" class="btn btn-success">Modificar</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#confirmChangeState{{ $requisitoBienestar->id }}">
                                                Cambiar Estado
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

@extends('adminlte::page')

@section('title', 'Requisitos de Bienestar inactivos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisitos de Bienestar: ') }}
                            </span>

                            <a href="{{ route('bienestar.index') }}" class="btn btn-danger">
                                {{ __('Volver a bienestar') }}
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
                                @foreach ($requisitosInactivos as $requisitoInactivo)
                                    <tr>
                                        <td>{{ $requisitoInactivo->id }}</td>
                                        <td>{{ $requisitoInactivo->servicio }}</td>
                                        <td>{{ $requisitoInactivo->detalle }}</td>
                                        <td>{{ $requisitoInactivo->requisitos }}</td>
                                        <td>{{ $requisitoInactivo->horarios }}</td>
                                        <td>
                                            {{ $requisitoInactivo->estado == 1 ? 'Activo' : 'Inactivo' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('requisito-bienestares.edit', ['id_bienestar' => $requisitoInactivo->Id_bienestar, 'id' => $requisitoInactivo->id]) }}" class="btn btn-success">Editar</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#confirmChangeState{{ $requisitoInactivo->id }}">
                                                Cambiar Estado
                                            </a>
                                        </td>
                                    </tr>

                                <!-- Modal de Confirmación para Cambio de Estado -->
                                    <div class="modal fade" id="confirmChangeState{{ $requisitoInactivo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <form action="{{ route('requisito-bienestares.cambiarEstado', $requisitoInactivo->id) }}" method="POST">
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
                {!! $requisitosInactivos->links() !!}
            </div>
        </div>
    </div>
@endsection

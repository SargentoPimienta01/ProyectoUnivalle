@extends('layouts.app')
@extends('layouts.jquery')

@section('template_title')
    Requisito Tramite
@endsection

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
                                {{ __('Volver atrás') }}
                            </a>


                            <!-- Botón que abre el modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                            {{ __('Agregar requisito') }}
                            </button>

                           
                            </div>

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
                                        <th>No</th>
                                        
										<th>Id Requisito</th>
										<th>Nombre Requisito</th>
										<th>Descripcion Requisito</th>
										<th>Estado</th>
										<th>Id Tramite</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisitosInactivos as $requisitoInactivo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $requisitoInactivo->Id_requisito }}</td>
											<td>{{ $requisitoInactivo->nombre_requisito }}</td>
											<td>{{ $requisitoInactivo->descripcion_requisito }}</td>
											<td>{{ $requisitoInactivo->estado }}</td>
											<td>{{ $requisitoInactivo->Id_tramite }}</td>

                                            <td>
                    {{ $requisitoInactivo->estado == 1 ? 'Activo' : 'Inactivo' }}
                </td>
                <td>
                <form action="{{ route('requisito-tramites.cambiarEstado', $requisitoInactivo->Id_requisito) }}" method="POST">
    @csrf
    @method('PUT') <!-- Agrega este campo oculto para indicar una solicitud PUT -->
    <button type="submit" class="btn btn-sm btn-{{ $requisitoInactivo->estado == 1 ? 'warning' : 'success' }}">
        <i class="fa fa-fw fa-power-off"></i>
        {{ $requisitoInactivo->estado == 1 ? 'Desactivar' : 'Activar' }}
    </button>
</form>

                    <a class="btn btn-sm btn-success" href="{{ route('requisito-tramites.edit', $requisitoInactivo->Id_requisito) }}">
                        <i class="fa fa-fw fa-edit"></i> Editar
                    </a>
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

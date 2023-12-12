@extends('adminlte::page')

@section('template_title')
    Postgrado
@endsection
@section('title', 'Admin | Postgrados inactivos')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
<div class="container py-1">
        <h2>Listado de Postgrados</h2>
</div>

<div class="card-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Postgrado') }}
                            </span>
                            
                             <div class="float-right">
                                <a href="{{ route('postgrados.index') }}" class="btn btn-danger float-right"  data-placement="left">
                                  {{ __('Volver a Postgrados') }}
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
										<th>Nombre Programa</th>
										<th>Descripcion</th>
										<th>Modalidad</th>
										<th>Categoria</th>
										<th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postgrados as $postgrado)
                                        <tr>
											<td>{{ $postgrado->Id_postgrado }}</td>
											<td>{{ $postgrado->nombre_programa }}</td>
											<td>{{ $postgrado->descripcion }}</td>
											<td>{{ $postgrado->modalidad }}</td>
											<td>{{ $postgrado->categoria }}</td>
											<td>
                                                @if ($postgrado->estado == 1)
                                                    Activo
                                                @else
                                                    Inactivo
                                                @endif
                                            </td>
                                            <td>
                                                <!--<form action="{{ route('postgrados.destroy',$postgrado->Id_postgrado) }}" method="POST">-->
                                                    <!--<a class="btn btn-sm btn-primary " href="{{ route('postgrados.show',$postgrado->Id_postgrado) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>-->
                                                    <a class="btn btn-sm btn-success" href="{{ route('postgrados.edit',$postgrado->Id_postgrado) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    <!--@csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>-->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmChangeState{{ $postgrado->Id_postgrado }}">
                                                    <i class="fa fa-fw fa-power-off"></i> {{ __('Cambiar Estado') }}
                                                </button>
                                               <!-- Modal de Confirmación para Cambio de Estado -->
                                        <div class="modal fade" id="confirmChangeState{{ $postgrado->Id_postgrado }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea cambiar el estado de esta carrera?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('direccion-carrera.cambiarEstado', $postgrado->Id_postgrado) }}" method="POST">
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
                {!! $postgrados->links() !!}
            </div>
        </div>
    </div>
@endsection

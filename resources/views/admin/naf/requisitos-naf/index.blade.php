@extends('adminlte::page')

@section('template_title')
    Requisitos Naf
@endsection
@section('title', 'Admin | NAF')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
<div class="container py-1">
        <h2>Listado de Requisitos Activos NAF</h2>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisitos Naf: ') }}{{ $naf->nombre_naf }}
                            </span>
                            @if(auth()->user()->hasRole('Admin'))
                            <a href="{{ route('requisitos-naf.inactivos') }}" class="btn btn-secondary">
                                {{ __('Ir a requisitos de Naf inactivos') }}
                            </a>
@endif
                            <a href="{{ route('nafs.index') }}" class="btn btn-danger">
                                {{ __('Volver a Nafs') }}
                            </a>

                             <!--<div class="float-right">
                                <a href="{{ route('requisitos-naf.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar requisito') }}
                                </a>
                              </div>-->
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
                                <form method="POST" action="{{ route('requisitos-naf.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="box box-info padding-1">
                                    <div class="box-body">
                                        <div class="form-group">
                                            {{ Form::label('nombre_requisito') }}
                                            {{ Form::text('nombre_requisito', $requisitosNaf->nombre_requisito ?? '', ['class' => 'form-control' . ($errors->has('nombre_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Requisito', 'required' => 'required',]) }}
                                            {!! $errors->first('nombre_requisito', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('descripcion_requisito') }}
                                            {{ Form::text('descripcion_requisito', $requisitosNaf->descripcion_requisito ?? '', ['class' => 'form-control' . ($errors->has('descripcion_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Requisito', 'required' => 'required',]) }}
                                            {!! $errors->first('descripcion_requisito', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <!--<div class="form-group" style="display: none;">
                                            {{ Form::label('estado') }}
                                            {{ Form::text('estado', $requisitosNaf->estado ?? '', ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado', 'required' => 'required',]) }}
                                            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>-->
                                        @if($requisitosNafs->isNotEmpty())
                                            @php
                                                $firstRequisitosNaf = $requisitosNafs->first();
                                            @endphp

                                            <div class="form-group" style="display: none;">
                                                {{ Form::label('Id_naf') }}
                                                {{ Form::text('Id_naf', $firstRequisitosNaf->Id_naf, ['class' => 'form-control' . ($errors->has('Id_naf') ? ' is-invalid' : ''), 'placeholder' => 'Id Naf', 'required' => 'required']) }}
                                                {!! $errors->first('Id_naf', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="box-footer mt20">
                                        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                                        <!--<a href="{{ route('nafs.index') }}" class="btn btn-danger">{{ __('Volver a Nafs') }}</a>-->
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                            {{ __('Cerrar') }}<span aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>

                                </form>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisitosNafs as $requisitosNaf)
                                        <tr>
											<td>{{ $requisitosNaf->Id_requisito }}</td>
											<td>{{ $requisitosNaf->nombre_requisito }}</td>
											<td>{{ $requisitosNaf->descripcion_requisito }}</td>
											<td>{{ $requisitosNaf->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                                            <td>
                                                <!--<a class="btn btn-sm btn-success" href="{{ route('requisitos-naf.edit',$requisitosNaf->Id_requisito) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>-->
                                                <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#editModal{{ $requisitosNaf->Id_requisito }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal{{ $requisitosNaf->Id_requisito }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel">{{ __('Editar Requisito Naf') }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <form method="POST" action="{{ route('requisitos-naf.update', $requisitosNaf->Id_requisito, $requisitosNaf->Id_naf) }}" role="form" enctype="multipart/form-data">
                                                                        {{ method_field('PUT') }}
                                                                        @csrf
                                                                        @include('admin.naf.requisitos-naf.form')
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button class="btn btn-sm btn-{{ $requisitosNaf->estado == 1 ? 'danger' : 'success' }}" data-toggle="modal" data-target="#confirmChangeState{{ $requisitosNaf->Id_requisito }}">
                                                    <i class="fa fa-fw fa-power-off"></i>
                                                    {{ $requisitosNaf->estado == 1 ? 'Desactivar' : 'Activar' }}
                                                </button>
                                            </td>
                                            <!-- Modal de Confirmación para Cambio de Estado -->
                                            <div class="modal fade" id="confirmChangeState{{ $requisitosNaf->Id_requisito }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Está seguro de que desea {{ $requisitosNaf->estado == 1 ? 'desactivar' : 'activar' }} esta categoría de trámites?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('requisitos-naf.cambiarEstado', $requisitosNaf->Id_requisito) }}" method="POST">
                                                                @csrf
                                                                @method('PUT') <!-- Agrega este campo oculto para indicar una solicitud PUT -->
                                                                <button type="submit" class="btn btn-{{ $requisitosNaf->estado == 1 ? 'danger' : 'success' }}">
                                                                    Confirmar Cambio de Estado
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
                    </div>
                </div>
                {!! $requisitosNafs->links() !!}
            </div>
        </div>
    </div>
@endsection

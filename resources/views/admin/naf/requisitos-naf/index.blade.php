@extends('adminlte::page')

@section('template_title')
    Requisitos Naf
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisitos Naf: ') }}{{ $naf->nombre_naf }}
                            </span>

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
            {{ Form::text('nombre_requisito', $requisitosNaf->nombre_requisito ?? '', ['class' => 'form-control' . ($errors->has('nombre_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Requisito']) }}
            {!! $errors->first('nombre_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_requisito') }}
            {{ Form::text('descripcion_requisito', $requisitosNaf->descripcion_requisito ?? '', ['class' => 'form-control' . ($errors->has('descripcion_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Requisito']) }}
            {!! $errors->first('descripcion_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $requisitosNaf->estado ?? '', ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('Id_naf') }}
            {{ Form::text('Id_naf', $requisitosNaf->Id_naf ?? '', ['class' => 'form-control' . ($errors->has('Id_naf') ? ' is-invalid' : ''), 'placeholder' => 'Id Naf']) }}
            {!! $errors->first('Id_naf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <a href="{{ route('nafs.index') }}" class="btn btn-danger">{{ __('Volver a Nafs') }}</a>
    </div>
</div>

                                </form>
                                </div>
                                </div>
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
                                                <a class="btn btn-sm btn-success" href="{{ route('requisitos-naf.edit',$requisitosNaf->Id_requisito) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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

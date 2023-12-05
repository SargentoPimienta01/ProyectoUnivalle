@extends('adminlte::page')

@section('template_title')
    Contacto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Contactos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar') }}
                                </a>
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
                                        
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Celular Trabajo</th>
										<th>Correo Institucional</th>
										<th>Área Responsable</th>
                                        <th>Estado</th>
										<th>Id Usuario</th>

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
											<td>{{ $contacto->area_responsable }}</td>
                                            <td>
                                                @if ($contacto->estado == 1) Activo @else Inactivo @endif
                                            </td>
											<td>{{ $contacto->id_usuario ? $contacto->id_usuario : 'Sin usuario asignado' }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{ route('contactos.edit',$contacto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $contactos->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('adminlte::page')

@section('template_title')
    Naf
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Naf') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('nafs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar Servicio') }}
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
										<th>Id</th>
										<th>Servicio</th>
										<th>Ubicación</th>
                                        <th>Descripción</th>
										<th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nafs as $naf)
                                        <tr>                                            
											<td>{{ $naf->Id_naf }}</td>
											<td>{{ $naf->nombre_naf }}</td>
											<td>{{ $naf->ubicacion->nombre_ubicacion }}</td>
                                            <td>
                                                @if($naf->descripcion === null)
                                                    <span style="color: red;">Nulo</span>
                                                @else
                                                    {{ $naf->descripcion }}
                                                @endif
                                            </td>
											<td>{{ $naf->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-secondary" href="{{ url('nafs/requisitos-naf/' . $naf->Id_naf) }}">
                                                    <i class="fa fa-fw fa-exchange"></i> {{ __('Administrar requisitos') }}
                                                </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('nafs.edit',$naf->Id_naf) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $nafs->links() !!}
            </div>
        </div>
    </div>
@endsection

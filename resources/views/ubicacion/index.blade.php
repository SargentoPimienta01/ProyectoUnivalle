@extends('adminlte::page')
@extends('layouts.jquery')

@section('template_title')
    Ubicacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ubicacion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ubicacion.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Nombre Ubicacion</th>
										<th>Edificio</th>
										<th>Planta</th>
										<th>Horario</th>
										<th>Detalles Direccion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ubicaciones as $ubicacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ubicacion->nombre_ubicacion }}</td>
											<td>{{ $ubicacion->edificio }}</td>
											<td>
                                            @if ($ubicacion->planta == 0)
                                                Planta baja
                                            @else
                                                {{ $ubicacion->planta }}
                                            @endif
                                        </td>
											<td>{{ $ubicacion->horario }}</td>
											<td>{{ $ubicacion->detalles_direccion }}</td>

                                            <td>
                                                <form action="{{ route('ubicacion.destroy',$ubicacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ubicacion.show',$ubicacion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ubicacion.edit',$ubicacion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ubicaciones->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('adminlte::page')

@section('template_title')
    Área
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Área') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('areas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
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
                                        
										<th>Id Área</th>
										<th>Nombre de Área</th>
										<th>Descripción</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($areas as $area)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $area->Id_area }}</td>
											<td>{{ $area->nombre_area }}</td>
											<td>{{ $area->descripcion }}</td>
											<td>
                                                {{ $area->estado == 1 ? 'Activo' : 'Inactivo' }}
                                            </td>

                                            <td>
                                                <form action="{{ route('areas.destroy',$area->Id_area) }}" method="POST">
                                                    <a class="btn btn-sm btn-success " href="{{ route('areas.show',$area->Id_area) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <!--<a class="btn btn-sm btn-success" href="{{ route('areas.edit',$area->Id_area) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>-->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $areas->links() !!}
            </div>
        </div>
    </div>
@endsection

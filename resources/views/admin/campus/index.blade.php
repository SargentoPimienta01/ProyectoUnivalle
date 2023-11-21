@extends('adminlte::page')

@section('template_title')
    Campus
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Campus') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('campuses.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Hora</th>
										<th>Fecha</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campuses as $campus)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $campus->nombre }}</td>
											<td>{{ $campus->hora }}</td>
											<td>{{ $campus->fecha }}</td>
											<td>
                                                @if ($campus->estado == 1)
                                                    Activo
                                                @else
                                                    Inactivo
                                                @endif
                                            </td>

                                            <td>
                                                <!--<form action="{{ route('campuses.destroy',$campus->id) }}" method="POST">-->
                                                    <a class="btn btn-sm btn-primary " href="{{ route('campuses.show',$campus->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('campuses.edit',$campus->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    <!--@csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>-->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $campuses->links() !!}
            </div>
        </div>
    </div>
@endsection

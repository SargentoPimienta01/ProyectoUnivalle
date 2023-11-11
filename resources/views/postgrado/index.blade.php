@extends('layouts.app')

@section('template_title')
    Postgrado
@endsection

@section('content')
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
                                <a href="{{ route('postgrados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Postgrado</th>
										<th>Nombre Programa</th>
										<th>Descripcion</th>
										<th>Modalidad</th>
										<th>Categoria</th>
										<th>Estado</th>
										<th>Id Area</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postgrados as $postgrado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $postgrado->Id_postgrado }}</td>
											<td>{{ $postgrado->nombre_programa }}</td>
											<td>{{ $postgrado->descripcion }}</td>
											<td>{{ $postgrado->modalidad }}</td>
											<td>{{ $postgrado->categoria }}</td>
											<td>{{ $postgrado->estado }}</td>
											<td>{{ $postgrado->Id_area }}</td>

                                            <td>
                                                <form action="{{ route('postgrados.destroy',$postgrado->Id_postgrado) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('postgrados.show',$postgrado->Id_postgrado) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('postgrados.edit',$postgrado->Id_postgrado) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $postgrados->links() !!}
            </div>
        </div>
    </div>
@endsection

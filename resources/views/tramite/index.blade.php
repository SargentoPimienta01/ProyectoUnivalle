@extends('layouts.app')

@section('template_title')
    Tramite
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tramite') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tramites.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Tramite</th>
										<th>Nombre Tramite</th>
										<th>Duracion Tramite</th>
										<th>Id Categoria Tramites</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tramites as $tramite)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tramite->Id_tramite }}</td>
											<td>{{ $tramite->nombre_tramite }}</td>
											<td>{{ $tramite->duracion_tramite }}</td>
											<td>{{ $tramite->id_categoria_tramites }}</td>
											<td>{{ $tramite->estado }}</td>

                                            <td>
                                                <form action="{{ route('tramites.destroy',$tramite->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tramites.show',$tramite->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tramites.edit',$tramite->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $tramites->links() !!}
            </div>
        </div>
    </div>
@endsection

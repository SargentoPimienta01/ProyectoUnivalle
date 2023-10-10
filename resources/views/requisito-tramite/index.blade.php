@extends('layouts.app')

@section('template_title')
    Requisito Tramite
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisito Tramite') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('requisito-tramites.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Requisito</th>
										<th>Nombre Requisito</th>
										<th>Descripcion Requisito</th>
										<th>Estado</th>
										<th>Id Tramite</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisitoTramites as $requisitoTramite)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $requisitoTramite->Id_requisito }}</td>
											<td>{{ $requisitoTramite->nombre_requisito }}</td>
											<td>{{ $requisitoTramite->descripcion_requisito }}</td>
											<td>{{ $requisitoTramite->estado }}</td>
											<td>{{ $requisitoTramite->Id_tramite }}</td>

                                            <td>
                                                <form action="{{ route('requisito-tramites.destroy',$requisitoTramite->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('requisito-tramites.show',$requisitoTramite->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('requisito-tramites.edit',$requisitoTramite->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $requisitoTramites->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

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
                                        
										<th>Id Naf</th>
										<th>Nombre Naf</th>
										<th>Ubicacion Naf</th>
										<th>Estado</th>
										<th>Id Area</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nafs as $naf)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $naf->Id_naf }}</td>
											<td>{{ $naf->nombre_naf }}</td>
											<td>{{ $naf->ubicacion_naf }}</td>
											<td>{{ $naf->estado }}</td>
											<td>{{ $naf->Id_area }}</td>

                                            <td>
                                                <form action="{{ route('nafs.destroy',$naf->Id_naf) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('nafs.show',$naf->Id_naf) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('nafs.edit',$naf->Id_naf) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $nafs->links() !!}
            </div>
        </div>
    </div>
@endsection

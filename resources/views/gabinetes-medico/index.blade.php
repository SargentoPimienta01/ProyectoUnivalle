@extends('layouts.app')

@section('template_title')
    Gabinetes Medico
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Gabinetes Medico') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('gabinetes-medico.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Gabinetemedico</th>
										<th>Nombre Gabinetemedico</th>
										<th>Ubicacion Gabinetemedico</th>
										<th>Estado</th>
										<th>Id Area</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gabinetesMedicos as $gabinetesMedico)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $gabinetesMedico->Id_gabinetemedico }}</td>
											<td>{{ $gabinetesMedico->nombre_gabinetemedico }}</td>
											<td>{{ $gabinetesMedico->ubicacion_gabinetemedico }}</td>
											<td>{{ $gabinetesMedico->estado }}</td>
											<td>{{ $gabinetesMedico->Id_area }}</td>

                                            <td>
                                                <form action="{{ route('gabinetes-medico.destroy',$gabinetesMedico->Id_gabinetemedico) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('gabinetes-medico.show',$gabinetesMedico->Id_gabinetemedico) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('gabinetes-medico.edit',$gabinetesMedico->Id_gabinetemedico) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $gabinetesMedicos->links() !!}
            </div>
        </div>
    </div>
@endsection

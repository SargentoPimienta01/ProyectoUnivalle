@extends('adminlte::page')

@section('template_title')
    Requisitos Gabinetes Medico
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisitos Gabinetes Medico') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('requisitos-gabinetesmedico.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Id Gabinetemedico</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisitosGabinetesMedicos as $requisitosGabinetesMedico)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $requisitosGabinetesMedico->Id_requisito }}</td>
											<td>{{ $requisitosGabinetesMedico->nombre_requisito }}</td>
											<td>{{ $requisitosGabinetesMedico->descripcion_requisito }}</td>
											<td>{{ $requisitosGabinetesMedico->estado }}</td>
											<td>{{ $requisitosGabinetesMedico->Id_gabinetemedico }}</td>

                                            <td>
                                                <form action="{{ route('requisitos-gabinetesmedico.destroy',$requisitosGabinetesMedico->Id_requisito) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('requisitos-gabinetesmedico.show',$requisitosGabinetesMedico->Id_requisito) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('requisitos-gabinetesmedico.edit',$requisitosGabinetesMedico->Id_requisito) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $requisitosGabinetesMedicos->links() !!}
            </div>
        </div>
    </div>
@endsection

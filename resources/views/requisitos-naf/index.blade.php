@extends('adminlte::page')

@section('template_title')
    Requisitos Naf
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisitos Naf') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('requisitos-naf.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Id Naf</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisitosNafs as $requisitosNaf)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $requisitosNaf->Id_requisito }}</td>
											<td>{{ $requisitosNaf->nombre_requisito }}</td>
											<td>{{ $requisitosNaf->descripcion_requisito }}</td>
											<td>{{ $requisitosNaf->estado }}</td>
											<td>{{ $requisitosNaf->Id_naf }}</td>

                                            <td>
                                                <form action="{{ route('requisitos-naf.destroy',$requisitosNaf->Id_requisito) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('requisitos-naf.show',$requisitosNaf->Id_requisito) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('requisitos-naf.edit',$requisitosNaf->Id_requisito) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $requisitosNafs->links() !!}
            </div>
        </div>
    </div>
@endsection

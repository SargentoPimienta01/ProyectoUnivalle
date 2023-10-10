@extends('layouts.app')

@section('template_title')
    Requisito Caja
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Requisito Caja') }}
                            </span>

                             <div class="float-right">
                                <a href="" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Id Caja</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisitoCajas as $requisitoCaja)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $requisitoCaja->Id_requisito }}</td>
											<td>{{ $requisitoCaja->nombre_requisito }}</td>
											<td>{{ $requisitoCaja->descripcion_requisito }}</td>
											<td>{{ $requisitoCaja->estado }}</td>
											<td>{{ $requisitoCaja->Id_caja }}</td>

                                            <td>
                                                <form action="" method="POST">
                                                    <a class="btn btn-sm btn-primary " href=""><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href=""><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $requisitoCajas->links() !!}
            </div>
        </div>
    </div>
@endsection

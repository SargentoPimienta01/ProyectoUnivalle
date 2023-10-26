@extends('layouts.app')

@section('template_title')
    Categoria Tramite
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categoria Tramite') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('categoria-tramites.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nueva categoría') }}
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
                                        
										<!--<th>Id Categoria Tramites</th>-->
										<th>Nombre Categoria</th>
										<!--<th>Estado</th>
										<th>Id Area</th>-->

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriaTramites as $categoriaTramite)
                                        <tr>
                                            <!--<td>{{ ++$i }}</td>-->
                                            
											<td>{{ $categoriaTramite->id_categoria_tramites }}</td>
											<td>{{ $categoriaTramite->nombre_categoria }}</td>
											<!--<td>{{ $categoriaTramite->estado }}</td>
											<td>{{ $categoriaTramite->Id_area }}</td>-->

                                            <td>
                                                <!--<form action="{{ route('categoria-tramites.destroy',$categoriaTramite->id_categoria_tramites) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('categoria-tramites.show',$categoriaTramite->id_categoria_tramites) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('categoria-tramites.edit',$categoriaTramite->id_categoria_tramites) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>-->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $categoriaTramites->links() !!}
            </div>
        </div>
    </div>
@endsection

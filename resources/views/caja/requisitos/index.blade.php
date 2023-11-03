@extends('adminlte::page')

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
                                <a href="{{ route('cajas.requisitos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                        <th>Id</th>
                                        <th>Nombre Requisito</th>
                                        <th>Descripcion Requisito</th>
                                        <th>Estado</th>
                                        <th>Id Caja</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requisitoCajas as $requisitoCaja)
                                        <tr>
                                            <td>{{ $requisitoCaja->Id_requisito }}</td>
                                            <td>{{ $requisitoCaja->nombre_requisito }}</td>
                                            <td>{{ $requisitoCaja->descripcion_requisito }}</td>
                                            <td>
                                                {{ $requisitoCaja->estado == 1 ? 'Activo' : 'Inactivo' }}
                                            </td>
                                            <td>{{ $requisitoCaja->Id_caja }}</td>

                                            <td>
                                                <form action="{{ route('cajas.requisitos.destroy', $requisitoCaja->Id_requisito) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('cajas.requisitos.show', $requisitoCaja->Id_requisito) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cajas.requisitos.edit', $requisitoCaja->Id_requisito) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                    </button>
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

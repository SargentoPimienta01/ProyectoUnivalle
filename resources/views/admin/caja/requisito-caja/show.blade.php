@extends('adminlte::page')

@section('template_title')
    {{ $requisitoCaja->name ?? "{{ __('Show') Requisito Caja" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Requisito Caja</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('requisito-cajas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Requisito:</strong>
                            {{ $requisitoCaja->Id_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Requisito:</strong>
                            {{ $requisitoCaja->nombre_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Requisito:</strong>
                            {{ $requisitoCaja->descripcion_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $requisitoCaja->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Caja:</strong>
                            {{ $requisitoCaja->Id_caja }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

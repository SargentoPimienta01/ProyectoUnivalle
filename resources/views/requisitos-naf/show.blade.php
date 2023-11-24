@extends('adminlte::page')

@section('template_title')
    {{ $requisitosNaf->name ?? "{{ __('Show') Requisitos Naf" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Requisitos Naf</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('requisitos-nafs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Requisito:</strong>
                            {{ $requisitosNaf->Id_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Requisito:</strong>
                            {{ $requisitosNaf->nombre_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Requisito:</strong>
                            {{ $requisitosNaf->descripcion_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $requisitosNaf->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Naf:</strong>
                            {{ $requisitosNaf->Id_naf }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

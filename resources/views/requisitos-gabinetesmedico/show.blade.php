@extends('adminlte::page')

@section('template_title')
    {{ $requisitosGabinetesMedico->name ?? "{{ __('Show') Requisitos Gabinetes Medico" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Requisitos Gabinetes Medico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('requisitos-gabinetes-medicos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Requisito:</strong>
                            {{ $requisitosGabinetesMedico->Id_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Requisito:</strong>
                            {{ $requisitosGabinetesMedico->nombre_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Requisito:</strong>
                            {{ $requisitosGabinetesMedico->descripcion_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $requisitosGabinetesMedico->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Gabinetemedico:</strong>
                            {{ $requisitosGabinetesMedico->Id_gabinetemedico }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

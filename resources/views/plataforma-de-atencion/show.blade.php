@extends('layouts.app')

@section('template_title')
    {{ $plataformaDeAtencion->name ?? "{{ __('Show') Plataforma De Atencion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Plataforma De Atencion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('plataforma-de-atencions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Plataforma De Atencion:</strong>
                            {{ $plataformaDeAtencion->Id_plataforma_de_atencion }}
                        </div>
                        <div class="form-group">
                            <strong>Servicio:</strong>
                            {{ $plataformaDeAtencion->servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $plataformaDeAtencion->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $plataformaDeAtencion->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Area:</strong>
                            {{ $plataformaDeAtencion->Id_area }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

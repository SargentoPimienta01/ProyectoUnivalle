@extends('layouts.app')

@section('template_title')
    {{ $contacto->name ?? __('Mostrar Contacto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Contacto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('contactos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $contacto->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $contacto->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Celular Trabajo:</strong>
                            {{ $contacto->celular_trabajo }}
                        </div>
                        <div class="form-group">
                            <strong>Correo Institucional:</strong>
                            {{ $contacto->correo_institucional }}
                        </div>
                        <div class="form-group">
                            <strong>Área Responsable:</strong>
                            {{ $contacto->area_responsable }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $contacto->id_usuario }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

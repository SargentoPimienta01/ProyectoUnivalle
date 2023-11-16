@extends('adminlte::page')

@section('template_title')
    {{ $ubicacion->name ?? "{{ __('Show') Ubicacion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ubicacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ubicacion.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Ubicacion:</strong>
                            {{ $ubicacion->nombre_ubicacion }}
                        </div>
                        <div class="form-group">
                            <strong>Edificio:</strong>
                            {{ $ubicacion->edificio }}
                        </div>
                        <div class="form-group">
                            <strong>Planta:</strong>
                            {{ $ubicacion->planta }}
                        </div>
                        <div class="form-group">
                            <strong>Horario:</strong>
                            {{ $ubicacion->horario }}
                        </div>
                        <div class="form-group">
                            <strong>Detalles Direccion:</strong>
                            {{ $ubicacion->detalles_direccion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

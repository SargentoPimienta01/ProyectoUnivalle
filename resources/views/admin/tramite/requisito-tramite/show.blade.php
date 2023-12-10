@extends('adminlte::page')

@section('template_title')
    {{ $requisitoTramite->name ?? "{{ __('Show') Requisito Tramite" }}
@endsection
@section('title', 'Univalle | Requisitos de trámites')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Requisito Tramite</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('requisito-tramites.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Requisito:</strong>
                            {{ $requisitoTramite->Id_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Requisito:</strong>
                            {{ $requisitoTramite->nombre_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Requisito:</strong>
                            {{ $requisitoTramite->descripcion_requisito }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $requisitoTramite->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tramite:</strong>
                            {{ $requisitoTramite->Id_tramite }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

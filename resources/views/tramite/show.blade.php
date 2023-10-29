@extends('adminlte::page')

@section('template_title')
    {{ $tramite->name ?? "{{ __('Show') Tramite" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tramite</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tramites.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Tramite:</strong>
                            {{ $tramite->Id_tramite }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Tramite:</strong>
                            {{ $tramite->nombre_tramite }}
                        </div>
                        <div class="form-group">
                            <strong>Duracion Tramite:</strong>
                            {{ $tramite->duracion_tramite }}
                        </div>
                        <div class="form-group">
                            <strong>Id Categoria Tramites:</strong>
                            {{ $tramite->id_categoria_tramites }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $tramite->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

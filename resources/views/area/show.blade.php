@extends('layouts.app')

@section('template_title')
    {{ $area->nombre_area ?? __('Mostrar Área') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar Área') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('areas.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Área:</strong>
                            {{ $area->Id_area }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Área:</strong>
                            {{ $area->nombre_area }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $area->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $area->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

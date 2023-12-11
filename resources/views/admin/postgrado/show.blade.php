@extends('adminlte::page')

@section('template_title')
    {{ $postgrado->name ?? "{{ __('Mostrar') Postgrado" }}
@endsection
@section('title', 'Admin | Postgrados')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Postgrado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('postgrados.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Postgrado:</strong>
                            {{ $postgrado->Id_postgrado }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Programa:</strong>
                            {{ $postgrado->nombre_programa }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $postgrado->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Modalidad:</strong>
                            {{ $postgrado->modalidad }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $postgrado->categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $postgrado->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Area:</strong>
                            {{ $postgrado->Id_area }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

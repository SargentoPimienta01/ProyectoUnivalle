@extends('adminlte::page')

@section('template_title')
    {{ $caja->name ?? "{{ __('Show') Caja" }}
@endsection
@section('title', 'Admin | Cajas')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Caja</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cajas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Caja:</strong>
                            {{ $caja->Id_caja }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Caja:</strong>
                            {{ $caja->nombre_caja }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Caja:</strong>
                            {{ $caja->descripcion_caja }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $caja->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Area:</strong>
                            {{ $caja->Id_area }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ $naf->name ?? "{{ __('Show') Naf" }}
@endsection
@section('title', 'Admin | NAF')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Naf</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('nafs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Naf:</strong>
                            {{ $naf->Id_naf }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Naf:</strong>
                            {{ $naf->nombre_naf }}
                        </div>
                        <div class="form-group">
                            <strong>Ubicacion Naf:</strong>
                            {{ $naf->ubicacion_naf }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $naf->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Area:</strong>
                            {{ $naf->Id_area }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

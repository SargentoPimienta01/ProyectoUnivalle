@extends('layouts.app')

@section('template_title')
    {{ $gabinetesMedico->name ?? "{{ __('Show') Gabinetes Medico" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Gabinetes Medico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('gabinetes-medicos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Gabinetemedico:</strong>
                            {{ $gabinetesMedico->Id_gabinetemedico }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Gabinetemedico:</strong>
                            {{ $gabinetesMedico->nombre_gabinetemedico }}
                        </div>
                        <div class="form-group">
                            <strong>Ubicacion Gabinetemedico:</strong>
                            {{ $gabinetesMedico->ubicacion_gabinetemedico }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $gabinetesMedico->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Area:</strong>
                            {{ $gabinetesMedico->Id_area }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

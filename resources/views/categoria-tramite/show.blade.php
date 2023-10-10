@extends('layouts.app')

@section('template_title')
    {{ $categoriaTramite->name ?? "{{ __('Show') Categoria Tramite" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Categoria Tramite</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categoria-tramites.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Categoria Tramites:</strong>
                            {{ $categoriaTramite->id_categoria_tramites }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Categoria:</strong>
                            {{ $categoriaTramite->nombre_categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $categoriaTramite->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Area:</strong>
                            {{ $categoriaTramite->Id_area }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

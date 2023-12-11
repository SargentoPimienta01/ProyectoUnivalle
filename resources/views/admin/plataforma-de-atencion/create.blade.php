@extends('adminlte::page')

@section('template_title')
    {{ __('Agregar') }} Plataforma De Atencion
@endsection
@section('title', 'Admin | Agregar plataforma de atención')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Agregar') }} Plataforma De Atencion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('plataforma-de-atencions.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.plataforma-de-atencion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

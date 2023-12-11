@extends('adminlte::page')

@section('template_title')
    {{ __('Actualizar') }} Contacto
@endsection
@section('title', 'Admin | Contactos')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Contacto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('contactos.update', $contacto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.contacto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

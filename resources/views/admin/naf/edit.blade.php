@extends('adminlte::page')

@section('template_title')
    {{ __('Actualizar') }} Naf
@endsection
@section('title', 'Admin | NAF')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Servicio - Naf</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('nafs.update', $naf->Id_naf) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.naf.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

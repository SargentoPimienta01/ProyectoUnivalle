@extends('adminlte::page')

@section('template_title')
    {{ __('Agregar') }} Requisitos Naf
@endsection
@section('title', 'Admin | NAF')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Agregar') }} Requisitos Naf</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('requisitos-naf.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.naf.requisitos-naf.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

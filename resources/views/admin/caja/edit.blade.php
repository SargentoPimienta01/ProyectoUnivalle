@extends('adminlte::page')

@section('template_title')
    {{ __('Actualizar') }} caja
@endsection
@section('title', 'Admin | Cajas')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} caja</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cajas.update', $caja->Id_caja) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.caja.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

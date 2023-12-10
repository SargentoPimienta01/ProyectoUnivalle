@extends('adminlte::page')

@section('template_title')
    {{ __('Actualizar') }} requisito de caja
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} requisito de caja</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('requisito-cajas.update', $requisitoCaja->Id_requisito) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf

                            @include('admin.caja.requisito-caja.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

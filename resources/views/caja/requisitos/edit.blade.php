@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Requisito Caja
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Requisito Caja</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('requisito-cajas.update', $requisitoCaja->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('requisito-caja.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

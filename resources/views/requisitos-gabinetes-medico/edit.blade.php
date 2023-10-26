@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Requisitos Gabinetes Medico
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Requisitos Gabinetes Medico</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('requisitos-gabinetes-medicos.update', $requisitosGabinetesMedico->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('requisitos-gabinetes-medico.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

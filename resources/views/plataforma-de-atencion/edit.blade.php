@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Plataforma De Atencion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Plataforma De Atencion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('plataforma-de-atencions.update', $plataformaDeAtencion->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('plataforma-de-atencion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('adminlte::page')

@section('template_title')
    {{ __('Agregar') }} requisito de tramite
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Agregar') }} requisito de trámite</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('requisito-tramites.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.tramite.requisito-tramite.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

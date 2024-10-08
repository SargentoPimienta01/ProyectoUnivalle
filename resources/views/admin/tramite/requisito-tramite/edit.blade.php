@extends('adminlte::page')

@section('template_title')
    {{ __('Actualizar') }} requisito de trámite
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} requisito de trámite</span>
                    </div>
                    <div class="card-body">

                    <form method="POST" action="{{ route('requisito-tramites.update', $requisitoTramite->Id_requisito) }}" role="form" enctype="multipart/form-data">


                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.tramite.requisito-tramite.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

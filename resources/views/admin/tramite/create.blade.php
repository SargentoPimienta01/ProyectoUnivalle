@extends('adminlte::page')

@section('title', 'Univalle | Agregar trámite')

<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Agregar') }} Tramite</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tramites.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.tramite.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

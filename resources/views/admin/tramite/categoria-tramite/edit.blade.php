@extends('adminlte::page')

@section('template_title')
    {{ __('Editar') }} Categoria Tramite
@endsection
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Categoria Tramite</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categoria-tramites.update', $categoriaTramite->id_categoria_tramites) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.tramite.categoria-tramite.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

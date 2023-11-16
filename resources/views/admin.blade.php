
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Categorías de trámites</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-folder"></i>
                                <a href="/categoria-tramites">Categorías de trámites.</a>
                            </p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

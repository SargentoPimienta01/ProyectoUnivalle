@extends('adminlte::page')

@section('title', 'Panel de control')

@section('content_header')
    <h1>Opciones del panel de control</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Administrar usuarios</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <i class="fas fa-users"></i>
                            <a href="/users">Usuarios</a>
                            <br>
                            <i class="fas fa-user-tag"></i>
                            <a href="/roles">Roles</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Administrar áreas</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-folder"></i>
                                <a href="/areas">Áreas</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Administrar Bienestar Universitario</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <i class="fas fa-users"></i>
                            <a href="/bienestar">Bienestar Universitario</a>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Administrar Trámites</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-folder"></i>
                                <a href="/categoria-tramites">Categorías de trámites</a>
                                <br>
                                <i class="fas fa-list"></i>
                                <a href="/tramites">Trámites</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Administrar Cajas</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-clipboard-list"></i>
                                <a href="/cajas">Cajas</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Gestionar Nafs</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-fw fa-money-bill-wave"></i>
                                <a href="/nafs">Nafs</a>
                                <br>
                                <i class="fas fa-clipboard-list"></i>
                                <a href="/requisitos-naf">Nafs Requisitos</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Gestionar Gabinetes Médicos</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-fw fa-medkit"></i>
                                <a href="/gabinetes-medico">Gabinetes Médicos</a>
                                <br>
                                <i class="fas fa-clipboard-list"></i>
                                <a href="/requisitos-gabinetesmedico">Gabinetes Médicos Requisitos</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Gestionar Gabinetes Médicos</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-fw fa-medkit"></i>
                                <a href="/gabinetes-medico">Gabinetes Médicos</a>
                                <br>
                                <i class="fas fa-clipboard-list"></i>
                                <a href="/requisitos-gabinetesmedico">Gabinetes Médicos Requisitos</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Ubicaciones</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-map-marker-alt"></i>
                                <a href="/ubicacion">Ubicaciones</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Postgrados</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-graduation-cap"></i>
                                <a href="/postgrados">Postgrados</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Plataforma de Atención</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-comments"></i>
                                <a href="/plataforma-de-atencions">Plataforma de Atención</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Biblioteca</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-book"></i>
                                <a href="/bibliotecas">Biblioteca</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Cafetería</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-coffee"></i>
                                <a href="/productos">Cafetería</a>
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

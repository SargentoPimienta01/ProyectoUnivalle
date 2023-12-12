@extends('adminlte::page')

@section('title', 'Panel de control')

@section('content_header')
    <h1>Opciones del panel de control</h1>
@stop

<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
    <div class="container">
        <div class="row">
            
        {{-- Administrar Usuarios --}}
            @can('user-list')
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
            @endcan

            {{-- Administrar Roles --}}
            @can('role-list')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Administrar Roles</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-user-tag"></i>
                                <a href="/roles">Roles</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endcan

            {{-- Áreas --}}
            @can('areas.index')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Áreas</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-th"></i>
                                <a href="/areas">Áreas</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endcan

            {{-- Trámites --}}
            @can('tramites.index')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Administrar Trámites</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-fw fa-file"></i>
                                <a href="/categoria-tramites">Categorías de trámites</a>
                                <br>
                                <i class="fas fa-list"></i>
                                <a href="/tramites">Trámites</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endcan

            {{-- Cajas --}}
            @can('cajas.index')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Administrar Cajas</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-fw fa-archive"></i>
                                <a href="/cajas">Cajas</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endcan

            {{-- Nafs --}}
            @can('nafs.index')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Gestionar Nafs</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-fw fa-money-bill-wave"></i>
                                <a href="/nafs">Nafs</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endcan

            {{-- Bienestar Universitario --}}
            @can('bienestar.index')
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
            @endcan

            {{-- Direcciones de Carrera --}}
            @can('direccion.index')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Administrar Direcciones de Carrera</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-award"></i>
                                <a href="/direccion-carrera">Direcciones de carrera</a>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            @endcan

            {{-- Gabinetes Médicos --}}
            @can('gabinetemedico.index')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Gestionar Gabinetes Médicos</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-fw fa-medkit"></i>
                                <a href="/bienestar/1/requisitos/gabinete-medico">Gabinetes Médicos</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endcan

            {{-- Cafetería --}}
            @can('cafeteria.index')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Cafetería</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-coffee"></i>
                                <a href="/categoria_menus">Gestionar categorías de cafetería</a>
                                <br>
                                <i class="fas fa-coffee"></i>
                                <a href="/productos">Gestionar productos de cafetería</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endcan

            {{-- Ubicaciones --}}
            @can('ubicaciones.index')
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
            @endcan

            {{-- Postgrados --}}
            @can('postgrados.index')
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
            @endcan

            {{-- Plataforma de Atención --}}
            @can('plataforma.index')
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
            @endcan

            {{-- Biblioteca --}}
            @can('biblioteca.index')
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
            @endcan

            {{-- Anuncios de Campus Deportivo --}}
            @can('campus.index')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Anuncios de Campus Deportivo</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-hockey-puck"></i>
                                <a href="/campuses">Anuncios de Campus Deportivo</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endcan

            {{-- Contactos --}}
            @can('contactos.index')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Administrar Contactos</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fas fa-address-card"></i>
                                <a href="/contactos">Contactos</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endcan

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

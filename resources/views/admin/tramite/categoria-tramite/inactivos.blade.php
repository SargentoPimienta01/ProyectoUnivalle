@extends('adminlte::page')

@section('template_title')
    Categoria Tramite
@endsection
@section('title', 'Admin | Categorías de trámites')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
<div class="container py-1">
        <h2>Categorías de trámites inactivas</h2>
</div>
<div class="card-body">
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categoria Tramite') }}
                            </span>

                            <a href="{{ route('categoria-tramites.index') }}" class="btn btn-danger">
                                {{ __('Volver a Categorías de trámites') }}
                            </a>

                        </div>
                    </div>
                    @if (session('success'))
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            Swal.fire({
                                title: 'Éxito',
                                text: '{{ session('success') }}',
                                icon: 'success'
                            });
                        </script>
                        @endif
                        @if (session('error'))
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                Swal.fire({
                                    title: 'Error!',
                                    text: '{{ session('error') }}',
                                    icon: 'error'
                                });
                            </script>
                        @endif
                        @if (session('fail'))
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                Swal.fire({
                                    title: 'Error!',
                                    text: '{{ session('fail') }}',
                                    icon: 'error'
                                });
                            </script>
                        @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Id</th>
										<th>Nombre Categoria</th>
										<th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriaTramites as $categoriaTramite)
                                        <tr>
											<td>{{ $categoriaTramite->id_categoria_tramites }}</td>
											<td>{{ $categoriaTramite->nombre_categoria }}</td>
											<td>
                                                <button class="btn btn-sm btn-{{ $categoriaTramite->estado == 1 ? 'danger' : 'success' }}" data-toggle="modal" data-target="#confirmChangeState{{ $categoriaTramite->id_categoria_tramites }}">
                                                    <i class="fa fa-fw fa-power-off"></i>
                                                    {{ $categoriaTramite->estado == 1 ? 'Desactivar' : 'Activar' }}
                                                </button>
                                            </td>
                                            <!-- Modal de Confirmación para Cambio de Estado -->
                                            <div class="modal fade" id="confirmChangeState{{ $categoriaTramite->id_categoria_tramites }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmar Cambio de Estado</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Está seguro de que desea {{ $categoriaTramite->estado == 1 ? 'desactivar' : 'activar' }} esta categoría de trámites?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('categoria-tramites.cambiarEstado', $categoriaTramite->id_categoria_tramites) }}" method="POST">
                                                                @csrf
                                                                @method('PUT') <!-- Agrega este campo oculto para indicar una solicitud PUT -->
                                                                <button type="submit" class="btn btn-{{ $categoriaTramite->estado == 1 ? 'danger' : 'success' }}">
                                                                    Confirmar Cambio de Estado
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $categoriaTramites->links() !!}
            </div>
        </div>
    </div>
@endsection

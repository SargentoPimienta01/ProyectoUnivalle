@extends('adminlte::page')
@section('title', 'Admin | Cafecito Categorías inactivas Menú')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">

@section('content')
    <div class="container">
        <h2>Categorías Inactivas</h2>

        <a href="{{url('categoria_menus')}}" class="btn btn-outline-danger my-2">Volver</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categoriasInactivas as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            <a href="{{ route('categoria_menus.edit', $categoria->id) }}" class="btn btn-primary">Editar</a>
                            
                            <button class="btn btn-success" data-toggle="modal" data-target="#confirmDelete{{ $categoria->id }}">Reactivar</button>
                            
                            <!-- Modal de confirmación -->
                            <div class="modal fade" id="confirmDelete{{ $categoria->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas cambiar el estado de la categoría?
                                        </div>
                                        <form id="reactivarForm{{ $categoria->id }}" action="{{ route('categoria_menus.cambiarEstado', $categoria->id) }}" method="post" style="display:inline">
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

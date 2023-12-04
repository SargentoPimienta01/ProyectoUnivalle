@extends('adminlte::page')

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
                            <form id="reactivarForm{{ $categoria->id }}" action="{{ route('categoria_menus.cambiarEstado', $categoria->id) }}" method="post" style="display:inline">
                                @csrf
                                <button type="submit" class="btn btn-success">Reactivar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

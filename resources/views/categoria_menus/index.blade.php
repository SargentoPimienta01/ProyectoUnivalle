<!-- resources/views/categoria_menus/index.blade.php -->

@extends('layout/template')

@section('contenido')
    <div class="container">
        <h2>Categorías de Menú</h2>

        <a href="{{url('categoria_menus/create')}}" class="btn btn-outline-success my-2">Nueva Categoría</a>

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
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            <a href="{{ route('categoria_menus.edit', $categoria->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('categoria_menus.destroy', $categoria->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

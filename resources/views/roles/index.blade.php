@extends('adminlte::page')
@section('title', 'Admin | Roles')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Administración de Roles</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}">Crear Nuevo Rol</a>
            @endcan
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
  <tr>
     <th>N°</th>
     <th>Nombre</th>
     <th width="280px">Acción</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Mostrar</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
            @endcan
            @can('role-delete')
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete{{ $role->id }}">
                        Eliminar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmDelete{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Por favor, introduce el nombre del rol "{{ $role->name }}" para confirmar la eliminación:</p>
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id], 'id' => 'deleteForm' . $role->id]) !!}
                                    <div class="form-group">
                                        {!! Form::text('confirmation_name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del rol', 'id' => 'confirmation_name' . $role->id]) !!}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger', 'id' => 'deleteBtn' . $role->id, 'disabled' => 'disabled']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
        </td>
    </tr>
    @endforeach
</table>
<script>
    // Habilita o deshabilita el botón Eliminar según si el campo de texto tiene un valor válido
    function toggleDeleteButton(roleId) {
        var confirmationName = document.getElementById('confirmation_name' + roleId).value;
        var deleteButton = document.getElementById('deleteBtn' + roleId);
        var roleName = '{{ $role->name }}';

        deleteButton.disabled = confirmationName.trim() !== roleName;
    }

    // Agrega un escuchador de eventos para la entrada de texto
    document.addEventListener('input', function (event) {
        if (event.target.matches('[id^="confirmation_name"]')) {
            var roleId = event.target.id.replace('confirmation_name', '');
            toggleDeleteButton(roleId);
        }
    });
</script>
{!! $roles->render() !!}

@endsection

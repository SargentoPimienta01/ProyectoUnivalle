@extends('adminlte::page')
@section('title', 'Admin | Usuarios')
<link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/UnivalleLogo.png') }}">
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Administración de Usuarios</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}">Crear Nuevo Usuario</a>
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
   <th>Correo Electrónico</th>
   <th>Roles</th>
   <th width="280px">Acción</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Mostrar</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete{{ $user->id }}">
                Eliminar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="confirmDelete{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Por favor, introduce el nombre del usuario "{{ $user->name }}" para confirmar la eliminación:</p>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'id' => 'deleteUserForm' . $user->id]) !!}
                            <div class="form-group">
                                {!! Form::text('confirmation_name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del usuario', 'id' => 'confirmation_name_user' . $user->id, 'data-username' => $user->name]) !!}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger', 'id' => 'deleteUserBtn' . $user->id, 'disabled' => 'disabled']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>

    <script>
        // Habilita o deshabilita el botón Eliminar según si el campo de texto tiene un valor válido
        document.addEventListener('input', function (event) {
            if (event.target.matches('[id^="confirmation_name_user"]')) {
                var userId = event.target.id.replace('confirmation_name_user', '');
                var confirmationName = event.target.value;
                var deleteUserButton = document.getElementById('deleteUserBtn' + userId);
                var expectedName = event.target.getAttribute('data-username');

                deleteUserButton.disabled = confirmationName.trim() !== expectedName;
            }
        });
    </script>
@endforeach
</table>

{!! $data->render() !!}
@endsection

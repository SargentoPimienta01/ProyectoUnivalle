@extends('adminlte::page')

@section('title', 'productos')

@section('content')
<main>   
        <div class="container-fluid contenido">
            @yield('dashOpt')
        </div>
  
    <div class="container py-1">
        <h2>Listado de Menu</h2>
   
         <a href="{{url('productos/create')}}" class="btn btn-success my-6 my-sm-0" style="position:absolute;left: 1700px;" type="submit">Nuevo registro</a>
        
        <form action="{{route('productos.index')}}" method="GET">
            <div class="container">
                <div class="my-3">
                <input type="search" name="busqueda" placeholder="Buscar..." class="form-control">
                
                </div>
                <div class="my-3">
                <input type="submit" value="Buscar" placeholder="Buscar..." class="btn btn-outline-primary">
                </div>
              
            </div>
        </form>

        <a href="{{ route('productospdf') }}" class="btn btn-success float-left">Generar reporte</a>

        <!--inicio nueva funcion delete-->  
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif
      
       <!--fin nueva funcion delete--> 
     

    <table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Foto</th>
            <th>Estado</th>   
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
   
    @foreach($productos as $producto)
   
    <tr>
        <td>{{$producto->id}}</td>
        <td>{{$producto->nombre}}</td>
        <td>{{$producto->descripcion}}</td>
        <td>{{$producto->precio}}</td>
        <td>{{$producto->foto}}</td>
        <td>{{$producto->estado}}</td>
        <td>
        <a href="{{url('productos/'.$producto->id.'/')}}" data-bs-toggle="modal" data-bs-target="#showModal{{$producto->id}}"  class="btn btn-success">Detalle</a>  
        </td>


        
         <!--modal mostrar-->
        <div class="modal fade" id="showModal{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title " id="modal-title">Detalle producto</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <span aria-hidden="true"></span>      
                </div>
                <div class="container">
                  <p><strong>Foto:</strong> {{ $producto->foto }}</p>
                  <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
                  <p><strong>Descripcion:</strong> {{ $producto->descripcion }}</p>
                  <p><strong>Precio:</strong> {{ $producto->precio}}</p>
                </div>         
              </div>
            </div>
          </div>
          <!--modal mostrar FIN-->

        <td><a href="{{url('productos/'.$producto->id.'/edit')}}" data-bs-toggle="modal" data-bs-target="#editModal{{$producto->id}}" class="btn btn-success ">Editar</a></td>
        <!--modal editar-->

    <div class="modal fade" id="editModal{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title " id="modal-title">Editar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <span aria-hidden="true"></span>      
          </div>

      <form action="{{url('productos/'.$producto->id)}}" method="post">
        @method("PUT")
            @csrf

            <div class="container">
              <div class="my-2">
                  <label for="foto" class="col-sm-2 col-form-label">Foto:</label>
                  <div class="col-sm-9">
                      <!-- Puedes mostrar la foto actual y proporcionar la opción de cargar una nueva -->
                      <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
                  </div>
              </div>
          </div>

         <div class="container">
          <div class="my-2">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" name="nombre" id="nombre" value="{{$producto->nombre}}" >
              </div>
          </div>
         </div>
           

         <div class="container">
          <div class="my-2">
            <label for="descripcion" class="col-sm-2 col-form-label">Descripcion:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$producto->descripcion}}" required>
            </div>
          </div>
         </div>


         <div class="container">
          <div class="my-2">
            <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="precio" id="precio" value="{{$producto->precio}}" required>
            </div>
         </div>
         </div>

       

         <div class="container"> 
            <div class="my-5">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a href="{{url('productos')}}" class="float-right btn btn-secondary ">Regresar</a>
                  <button type="submit" class="float-left btn btn-warning ">Modificar </button>
              </div>  
            </div>
          </div>
        </form>

    </div>
  </div>
</div>

      
        <td>
            @if($producto->estado)
                <form action="{{ route('productos.desactivar', $producto->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger" >Desactivar</button>
                </form>
            @else
                <form action="{{ route('productos.activar', $producto->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success" >Activar</button>
                </form>
            @endif
        </td>
    </tr>
    @endforeach
 
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4"> {{$productos->appends(['busqueda=>$busqueda'])}}</td>
      </tr>
    </tfoot>
    </table>
  
    </div>


    <!--modal confirmacion -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title " id="modal-title">delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>¿Estas seguro de desactivar de la vista actual este registro registro?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          
            <form id="formDelete" action="{{route('productos.delete', $producto->id)}}" method="POST">  
            @csrf     
              @method("DELETE")
              <button type="submit" class="btn btn-danger">Confirmar</button>
              </form>
            </div>
        </div>
      </div>
    </div>

   <!--fin -->

   <script>

const deleteModal = document.getElementById('deleteModal')
        if (deleteModal) {
            deleteModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const recipient = button.getAttribute('data-id')
            
                const modalTitle = deleteModal.querySelector('.modal-title')
                const modalBodyInput = deleteModal.querySelector('.modal-body input')
                 
               modalTitle.textContent = `Se quitara de la lista el producto:  ${recipient}`

                    modalBodyInput.value = recipient

                    action =$('#formDelete').attr('data-action').slice(0,-1);
                    action =id;

                    $('#formDelete').attr('action', action);

                    console.log(action)

                    var modal = $(this)        
} 
)} 
   </script>
</main>
@endsection
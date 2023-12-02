@extends('adminlte::page')
@extends('layouts.jquery')

@section('title', 'Univalle')

@section('content')
<main> 
        <div class="container-fluid contenido">
            @yield('dashOpt')
        </div>
  
    <div class="container py-1">
        <h2>Listado de Anuncios Biblioteca</h2>
        </div>

        <div class="card-body">
    <div class="mb-3">
        <form action="{{ route('bibliotecas.index') }}" method="GET">
            <div class="input-group">
            <input type="search" name="busqueda" placeholder="Buscar..." class="form-control">
                <button type="submit" class="btn btn-primary">Buscar</button>
                @if($busqueda)
                    <div class="input-group-append">
                        <a href="{{ route('bibliotecas.index') }}" class="btn btn-outline-danger">Limpiar</a>
                    </div>
                @endif
            </div>
        </form>
    </div>

        <!--<a href="{{ route('bibliotecaspdf') }}" class="btn btn-success float-left">Generar reporte</a>-->
      
        <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span id="card_title">
                            {{ __('Listado de anuncios Biblioteca') }}
                        </span>
                        <!--<a href="{{ route('tramites.inactivos') }}" class="btn btn-secondary">
                            {{ __('Ir a Trámites inactivos') }}
                        </a>-->
                        <a href="{{ route('admin') }}" class="btn btn-danger">
                            {{ __('Volver') }}
                        </a>
                         <div class="float-right">
                            <a href="{{ route('bibliotecas.create') }}" class="btn btn-primary float-right"  data-placement="left">
                              {{ __('Crear nuevo anuncio') }}
                            </a>
                          </div>
                    </div></div>
                    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif
        <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Foto</th>
            <th>Categoría</th>
            <th>Estado</th>   
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
   
    @foreach($bibliotecas as $biblioteca)
   
    <tr>
        <td>{{$biblioteca->id}}</td>
        <td>{{$biblioteca->titulo}}</td>
        <td>{{$biblioteca->descripcion}}</td>
        <td>{{$biblioteca->fecha}}</td>
        <td>{{$biblioteca->hora}}</td>
        <td>
                                                <img class="thumbnail" src="{{ $biblioteca->foto }}" onclick="showImagePopup('{{ $biblioteca->foto }}')">
                                            </td>

                                            <!-- Popup de la imagen -->
                                            <div class="image-popup" id="imagePopup">
                                                <span class="close" onclick="closeImagePopup()">&times;</span>
                                                <img class="popup-content" id="imgPopup">
                                            </div>

                                            <style>
                                                /* Estilos para la miniatura */
                                                .thumbnail {
                                                    cursor: pointer;
                                                    max-width: 100px; /* Tamaño inicial de la miniatura */
                                                }

                                                /* Estilos para el popup */
                                                .image-popup {
                                                    display: none;
                                                    position: fixed;
                                                    z-index: 1;
                                                    left: 0;
                                                    top: 0;
                                                    width: 100%;
                                                    height: 100%;
                                                    overflow: auto;
                                                    background-color: rgba(0, 0, 0, 0.9);
                                                    padding-top: 120px;
                                                }

                                                .popup-content {
                                                    padding-left: 50px;
                                                    margin: auto;
                                                    display: block;
                                                    max-width: 80%; /* Tamaño máximo del popup */
                                                    max-height: 80vh;
                                                }

                                                .close {
                                                    padding-top: 50px;
                                                    color: #fff;
                                                    position: absolute;
                                                    top: 15px;
                                                    right: 35px;
                                                    font-size: 30px;
                                                    font-weight: bold;
                                                    cursor: pointer;
                                                }
                                            </style>

                                            <script>
                                                // Función para mostrar el popup con la imagen más grande
                                                function showImagePopup(imgSrc) {
                                                    var popup = document.getElementById("imagePopup");
                                                    var popupImg = document.getElementById("imgPopup");
                                                    popup.style.display = "block";
                                                    popupImg.src = imgSrc;
                                                }

                                                // Función para cerrar el popup
                                                function closeImagePopup() {
                                                    var popup = document.getElementById("imagePopup");
                                                    popup.style.display = "none";
                                                }
                                            </script>
        <td>{{ $biblioteca->categoria }}</td>
        <td>{{ $biblioteca->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
        <td>
        <!--<a href="{{url('bibliotecas/'.$biblioteca->id.'/')}}" data-bs-toggle="modal" data-bs-target="#showModal{{$biblioteca->id}}"  class="btn btn-success">Detalle</a>-->
        </td>
        
         <!--modal mostrar-->
        <div class="modal fade" id="showModal{{$biblioteca->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title " id="modal-title">Detalle anuncio</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <span aria-hidden="true"></span>      
                </div>
                <div class="container">
                  <p><strong>Foto:</strong> {{ $biblioteca->foto }}</p>
                  <p><strong>Titulo:</strong> {{ $biblioteca->titulo }}</p>
                  <p><strong>Descripcion:</strong> {{ $biblioteca->descripcion }}</p>
                  <p><strong>Fecha:</strong> {{ $biblioteca->fecha}}</p>
                  <p><strong>Hora:</strong> {{ $biblioteca->hora}}</p>
                </div>         
              </div>
            </div>
          </div>
          <!--modal mostrar FIN-->

        <td><a href="{{url('bibliotecas/'.$biblioteca->id.'/edit')}}" data-bs-toggle="modal" data-bs-target="#editModal{{$biblioteca->id}}" class="btn btn-sm btn-success">Editar</a></td>
        <!--modal editar-->

    <div class="modal fade" id="editModal{{$biblioteca->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title " id="modal-title">Editar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <span aria-hidden="true"></span>      
          </div>

      <form action="{{url('bibliotecas/'.$biblioteca->id)}}" method="post">
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
                  <label for="titulo" class="col-sm-2 col-form-label">Título:</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="titulo" id="titulo" value="{{$biblioteca->titulo}}">
                  </div>
              </div>
          </div>
          
          <div class="container">
              <div class="my-2">
                  <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$biblioteca->descripcion}}" required>
                  </div>
              </div>
          </div>
          
          <div class="container">
            <div class="my-2">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
                <div class="col-sm-9">
                    <!-- Display the default date as a disabled text input -->
                    <input type="text" class="form-control" name="fecha" id="fecha" value="{{$biblioteca->fecha}}" disabled>
                </div>
            </div>
        </div>
        
          
          <div class="container">
              <div class="my-2">
                  <label for="hora" class="col-sm-2 col-form-label">Hora:</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="hora" id="hora" value="{{$biblioteca->hora}}" required>
                  </div>
              </div>
          </div>
          

       

         <div class="container"> 
            <div class="my-5">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a href="{{url('bibliotecas')}}" class="float-right btn btn-secondary ">Regresar</a>
                  <button type="submit" class="float-left btn btn-warning ">Modificar </button>
              </div>  
            </div>
          </div>
        </form>
        </div>
                                        </div>
    </div>
  </div>
</div>

      
<td>
    @if($biblioteca->estado)
        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#changeEstadoModal{{ $biblioteca->id }}">
            Desactivar
        </button>
    @else
        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#changeEstadoModal{{ $biblioteca->id }}">
            Activar
        </button>
    @endif

    <!-- Modal de cambio de estado de biblioteca -->
    <div class="modal fade" id="changeEstadoModal{{ $biblioteca->id }}" tabindex="-1" role="dialog" aria-labelledby="changeEstadoModalLabel{{ $biblioteca->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeEstadoModalLabel{{ $biblioteca->id }}">
                        Confirmar Cambio de Estado
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea {{ $biblioteca->estado == 1 ? 'desactivar' : 'activar' }} esta biblioteca?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ $biblioteca->estado ? route('bibliotecas.desactivar', $biblioteca->id) : route('bibliotecas.activar', $biblioteca->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-{{ $biblioteca->estado == 1 ? 'danger' : 'success' }}">
                            Confirmar Cambio de Estado
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</td>


    </tr>
    @endforeach
 
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4"> {{$bibliotecas->appends(['busqueda=>$busqueda'])}}</td>
      </tr>
    </tfoot>
    </table>
  
    </div></div></div></div></div>


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
          
            <form id="formDelete" action="{{route('bibliotecas.delete', $biblioteca->id)}}" method="POST">  
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
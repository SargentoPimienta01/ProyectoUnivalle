@extends('adminlte::page')
@extends('layouts.jquery')

@section('title', 'Univalle')

@section('content')
<main>
  <div class="container-fluid contenido">
    @yield('dashOpt')
  </div>

  <div class="container py-1">
    <h2>Listado de Menú</h2>
  </div>

  <div class="card-body">
    <div class="mb-3">
      <form action="{{ route('productos.inactivos') }}" method="GET">
        <div class="input-group">
          <input type="search" name="busqueda" placeholder="Buscar..." class="form-control">
          <button type="submit" class="btn btn-primary">Buscar</button>
          @if($busqueda)
          <div class="input-group-append">
            <a href="{{ route('productos.inactivos') }}" class="btn btn-outline-danger">Limpiar</a>
          </div>
          @endif
        </div>
      </form>
    </div>

    <!--<a href="{{ route('productospdf') }}" class="btn btn-success float-left">Generar reporte</a>-->

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="card_title">
                  {{ __('Listado de productos') }}
                </span>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                  {{ __('Volver a activos') }}
                </a>
              </div>
            </div>
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
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Precio (Bs)</th>
                      <th>Foto</th>
                      <th>Categoría</th>
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
                      <td>
                        <img class="thumbnail" src="{{ $producto->foto }}"
                          onclick="showImagePopup('{{ $producto->foto }}')">
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
                          max-width: 100px;
                          /* Tamaño inicial de la miniatura */
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
                          max-width: 80%;
                          /* Tamaño máximo del popup */
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
                      <td>{{ $producto->categoria->nombre }}</td>
                      <td>{{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                      <!--<td>
                        <a href="{{url('productos/'.$producto->id.'/')}}" data-bs-toggle="modal"
                          data-bs-target="#showModal{{$producto->id}}" class="btn btn-success">Detalle</a>
                      </td>-->
                      <!--modal mostrar-->
                      <div class="modal fade" id="showModal{{$producto->id}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title " id="modal-title">Detalle producto</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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

                      <td><a href="{{url('productos/'.$producto->id.'/edit')}}" data-bs-toggle="modal"
                          data-bs-target="#editModal{{$producto->id}}" class="btn btn-sm btn-success">Editar</a></td>
                      <!--modal editar-->

                      <div class="modal fade" id="editModal{{$producto->id}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title " id="modal-title">Editar</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                      value="{{$producto->nombre}}">
                                  </div>
                                </div>
                              </div>


                              <div class="container">
                                <div class="my-2">
                                  <label for="descripcion" class="col-sm-2 col-form-label">Descripcion:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" name="descripcion" id="descripcion"
                                      value="{{$producto->descripcion}}" required>
                                  </div>
                                </div>
                              </div>


                              <div class="container">
                                <div class="my-2">
                                  <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" name="precio" id="precio"
                                      value="{{$producto->precio}}" required>
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
                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#changeEstadoModal{{ $producto->id }}">
                                Desactivar
                            </button>
                            @else
                            <button class="btn btn-sm btn-success" data-toggle="modal"
                                data-target="#changeEstadoModal{{ $producto->id }}">
                                Activar
                            </button>
                            @endif

                            <!-- Modal de cambio de estado de producto -->
                            <div class="modal fade" id="changeEstadoModal{{ $producto->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="changeEstadoModalLabel{{ $producto->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="changeEstadoModalLabel{{ $producto->id }}">
                                                Confirmar Cambio de Estado
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Está seguro de que desea {{ $producto->estado == 1 ? 'desactivar' :
                                            'activar' }} esta producto?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                            <form
                                                action="{{ $producto->estado ? route('productos.desactivar', $producto->id) : route('productos.activar', $producto->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn btn-{{ $producto->estado == 1 ? 'danger' : 'success' }}">
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
                      <td colspan="4"> {{$productos->appends(['busqueda=>$busqueda'])}}</td>
                    </tr>
                  </tfoot>
                </table>

              </div>


              <!--modal confirmacion -->
              <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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

                      @if(isset($producto))
                        <form id="formDelete" action="{{ route('productos.delete', $producto->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Confirmar</button>
                        </form>
                        @endif


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

                    action = $('#formDelete').attr('data-action').slice(0, -1);
                    action = id;

                    $('#formDelete').attr('action', action);

                    console.log(action)

                    var modal = $(this)
                  }
                  )
                } 
              </script>
</main>
@endsection
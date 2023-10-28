<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soft Deletes In Laravel</title>
  <link rel="stylesheet" href="style.css">
 
</head>
<body>
    <div id="viewport">
        <div id="sidebar">
          <header>
            <a href="#"> My App</a>
          </header>
          <ul>
              <li class="nav"><a class="btn btn-default m-2" href="/"> <i class="fa fa-thin fa-newspaper"></i> Article</a></li>
              <li class="nav"><a class="btn btn-default m-2" href="trashed"> <i class="fa fa-duotone fa-trash"></i>   Trashed</a></li>
          </ul>
        </div>
        
       
          <div class="container-fluid ">
                 <h1 class="text-center text-danger py-4">Restore Articles</h1>
           <table class="table">
            <h3><a class="btn btn-success" href="restore-all"><i class="fa fa-sharp fa-solid fa-trash-arrow-up"></i> Restore All</a></h3>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Fecha de registro</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($productos as $producto)
                    <tr>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->stock}}</td>
                        <td>{{$producto->fecha_registro}}</td>
                        <td><a href="restore/{{$producto->id}}" class="text-primary btn"><i class="fa fa-sharp fa-solid fa-trash-arrow-up"></i></a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
              </table>
          </div>
      </div>
</body>
</html>
 -->
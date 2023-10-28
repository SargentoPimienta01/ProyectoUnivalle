<!DOCTYPE html>
<html>
<head>
    <title >Reporte del menu</title>
    <style>
        #productos {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #productos td, #productos th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #productos tr:nth-child(even){background-color: #f2f2f2;}

        #productos tr:hover {background-color: #ddd;}

        #productos th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #41436A;
        color: white;
        }

        #logo {
        width: 100px; 
        }

        .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        }
    </style>
</head>
<body>
    
    <h1>Reporte del Menu</h1>

    <div class="header">
      <!--  <img id="logo" src="D:\logo_fit.png" alt="Logo"> -->
        <div>
            <p>El cafecito</p>
            <p>nombre de usuario: </p>  
            <p>Fecha de impresión: {{ date('d/m/Y') }}</p> 
        </div>
       
    </div>

    <table id="productos">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th> 
            </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->precio}}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
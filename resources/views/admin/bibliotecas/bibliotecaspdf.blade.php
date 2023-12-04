<!DOCTYPE html>
<html>
<head>
    <title >Reporte de biblioteca</title>
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
    
    <h1>Reporte de bibliotecas</h1>

    <div class="header">
      <!--  <img id="logo" src="D:\logo_fit.png" alt="Logo"> -->
        <div>
            <p>bibliotecas</p>
            <p>nombre de usuario: </p>  
            <p>Fecha de impresión: {{ date('d/m/Y') }}</p> 
        </div>
       
    </div>

    <table id="bibliotecas">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Fecha</th> 
                <th>Hora</th> 
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

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
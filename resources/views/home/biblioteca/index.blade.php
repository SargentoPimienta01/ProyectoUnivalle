@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
   body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #EAE8E9ff;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100vh;
        }

        h1 {
        text-align: center;
        color: #9E0442ff;
        font-size: 2em;
        transition: color 0.3s ease-in-out;
        margin-bottom: 20px;
        }

        h1:hover {
        color: #68091Fff;
        }

        .container {
        display: flex;
        justify-content: center;
        width: 80%;
        margin-top: 20px;
        }

        .column {
        flex: 0 0 auto;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        }

        .item {
        width: 400px;
        height: 250px;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid rgb(87, 3, 0);
        padding: 5px;
        text-align: center;
        border-radius: 25px;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
        margin: 20px 10px;
        }

        .item:hover {
        transform: scale(1.05);
        }

        .item::before {
        content: "";
        display: block;
        padding-top: 100%;
        }

        .item-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        height: 90%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        }

        .item-content img {
        width: 30%;
        margin-right: 20px;
        border-radius: 50%;
        }

        .item-content p {
        margin: 0;
        }

        .column-heading {
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 10px;
        }

  </style>
</head>
<body>

  <h1>Biblioteca</h1>

  <div class="container">
    <div class="column">
      <div class="column-heading">ANUNCIOS</div>
      <div class="item">
        <div class="item-content">
          <img src="tu-imagen.jpg" alt="Imagen" />
          <div>
            <p><strong>Título del Anuncio 1</strong></p>
            <p>Descripción del Anuncio 1.</p>
            <p>Fecha: 2023-11-11</p>
            <p>Hora: 14:00</p>
          </div>
        </div>
      </div>


      <div class="item">
        <div class="item-content">
          <img src="tu-imagen.jpg" alt="Imagen" />
          <div>
            <p><strong>Título del Anuncio 2</strong></p>
            <p>Descripción del Anuncio 1.</p>
            <p>Fecha: 2023-11-11</p>
            <p>Hora: 14:00</p>
          </div>
        </div>
      </div>

      <!-- MAS -->
    </div>

    <div class="column">
      <div class="column-heading">EVENTOS</div>
      <div class="item">
        <div class="item-content">
          <img src="tu-otra-imagen.jpg" alt="Imagen" />
          <div>
            <p><strong>Título del Evento 1</strong></p>
            <p>Descripción del Evento 1.</p>
            <p>Fecha: 2023-11-12</p>
            <p>Hora: 18:30</p>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="item-content">
          <img src="tu-otra-imagen.jpg" alt="Imagen" />
          <div>
            <p><strong>Título del Evento 1</strong></p>
            <p>Descripción del Evento 1.</p>
            <p>Fecha: 2023-11-12</p>
            <p>Hora: 18:30</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>

</body>
</html>

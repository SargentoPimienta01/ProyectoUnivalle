<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>Univalle</title>
    
</head>
<body>
    <div class="navbar">
        <!--<a href="/home" class="nav-button nav-left">
            <div class="circle"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Univalle_bol_cbb_logo.png" alt="Univalle Logo" height="30"></div>
        </a>-->
        <a href="/home" class="nav-button nav-left">
            <div class="circle"><i class="fas fa-home"></i></div>
        </a>
        <a class="nav-button nav-left" id="backButton">
            <div class="circle"><i class="fas fa-arrow-left"></i></div>
        </a>
        
        <h2 class="nav-center">UNIVALLE</h2>
        <!--<a href="/" class="nav-button nav-right">
            <div class="circle"><i class="fas fa-sign-in-alt"></i></div>
        </a>-->
        <a href="/" class="nav-button nav-left">
            <div class="circle"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Univalle_bol_cbb_logo.png" alt="Univalle Logo" height="30"></div>
        </a>
    </div>
</body>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #68091Fff;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    height: 100vh;
    margin-top: 5%;
}

.navbar {
    position: fixed;
    top: 0; /* Fija la barra en la parte superior */
    left: 0; /* Fija la barra en la parte izquierda */
    width: 100%; /* Ocupa todo el ancho de la ventana */
    background-color: rgb(68, 7, 21);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    z-index: 999; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra opcional para resaltar la barra */
}

body {
    margin-top: 60px; /* Ajusta el margen superior del cuerpo para evitar que se solape con la barra de navegación fija */
}

.nav-left, .nav-right {
    display: flex;
    align-items: center;
}

.nav-center {
    text-align: center;
    flex-grow: 1;
}

.nav-button {
    text-decoration: none;
    color: #fff;
    margin: 0 10px;
}

.header {
    text-align: left;
    margin: 20px;
}

h2 {
    font-size: 30px;
    color: #fff;
    margin: 0;
}

.contenedor {
    display: flex;
    flex-direction: column;
    align-items: center; 
}

.cuadroInformativo {
    background-color: #fff;
    border-radius: 10px;
    width: 35%;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin: 10px;
    text-align: left;
}

.contenido {
    height: 100%; 
    display: flex;
    flex-direction: column;
}

.tituloInf {
    font-size: 20px;
    color: #000;
    margin: 10px 0;
}

.subTitulo {
    font-size: 19px;
    color: #000;
    margin: 10px 0;
}

.parrafoInf {
    font-size: 15px;
    color: #333;
    margin: 10px 0;
}

.circle {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 40px; 
    height: 40px; 
    background-color: rgb(49, 6, 16);
    border-radius: 50%;
    margin: 0 0px; 
    margin-right: 10%;
}

.circle i {
    color: #fff; 
    font-size: 20px; 
    cursor: pointer;
}

.circle img {
    border-radius: 50%;
    width: 100%;
    height: 100%;
}

</style>

<script>
    document.addEventListener('keydown', function (event) {
        // Verificar si la tecla presionada es la tecla de retroceso (backspace)
        if (event.key === 'Backspace') {
            // Realizar la acción deseada, por ejemplo, volver atrás en la historia del navegador
            window.history.back();
            
            // Evitar el comportamiento predeterminado del navegador para la tecla de retroceso
            event.preventDefault();
        }
    });
    document.getElementById('backButton').addEventListener('click', function (event) {
        // Verificar si el clic fue realizado en el ícono de flecha izquierda
        if (event.target.closest('.fa-arrow-left')) {
            // Realizar la acción deseada, por ejemplo, volver atrás en la historia del navegador
            window.history.back();
        }
    });
</script>
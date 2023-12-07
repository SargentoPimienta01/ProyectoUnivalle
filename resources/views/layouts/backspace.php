<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>Univalle</title>
    
</head>
<body>
    <div class="univalle-navbar">
        <!--<a href="/home" class="nav-button nav-left">
            <div class="circle"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Univalle_bol_cbb_logo.png" alt="Univalle Logo" height="30"></div>
        </a>-->
        <a href="/home" class="univalle-nav-button univalle-nav-left">
            <div class="univalle-circle"><i class="fas fa-home"></i></div>
        </a>
        <a class="univalle-nav-button univalle-nav-left" id="univalle-backButton">
            <div class="univalle-circle"><i class="fas fa-arrow-left"></i></div>
        </a>
        
        <h2 class="univalle-nav-center">UNIVALLE</h2>
        <!--<a href="/" class="nav-button nav-right">
            <div class="circle"><i class="fas fa-sign-in-alt"></i></div>
        </a>-->
        <a href="/" class="univalle-nav-button univalle-nav-left">
            <div class="univalle-circle"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Univalle_bol_cbb_logo.png" alt="Univalle Logo" height="30"></div>
        </a>
    </div>
</body>
<style>
    body {
    font-family: Arial, sans-serif !important;
    background-color: #68091Fff !important;
    margin: 0 !important;
    padding: 10px !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: flex-start !important;
    height: 100vh !important;
    margin-top: 5% !important;
}

.univalle-navbar {
    position: fixed !important;
    top: 0 !important; /* Fija la barra en la parte superior */
    left: 0 !important; /* Fija la barra en la parte izquierda */
    width: 100% !important; /* Ocupa todo el ancho de la ventana */
    background-color: rgb(68, 7, 21) !important;
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    padding: 10px !important;
    z-index: 999 !important; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) !important; /* Sombra opcional para resaltar la barra */
}

body {
    margin-top: 60px !important; /* Ajusta el margen superior del cuerpo para evitar que se solape con la barra de navegación fija */
}

.univalle-nav-left, .univalle-nav-right {
    display: flex !important;
    align-items: center !important;
}

.univalle-nav-center {
    text-align: center !important;
    flex-grow: 1 !important;
}

.univalle-nav-button {
    text-decoration: none !important;
    color: #fff !important;
    margin: 0 10px !important;
}

.header {
    text-align: left !important;
    margin: 20px !important;
}

h2 {
    font-size: 30px !important;
    color: #fff !important;
    margin: 0 !important;
}

.contenedor {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important; 
}

.cuadroInformativo {
    background-color: #fff !important;
    border-radius: 10px !important;
    width: 35% !important;
    padding: 20px !important;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2) !important;
    margin: 10px !important;
    text-align: left !important;
}

.contenido {
    height: 100% !important; 
    display: flex !important;
    flex-direction: column !important;
}

.tituloInf {
    font-size: 20px !important;
    color: #000 !important;
    margin: 10px 0 !important;
}

.subTitulo {
    font-size: 19px !important;
    color: #000 !important;
    margin: 10px 0 !important;
}

.parrafoInf {
    font-size: 15px !important;
    color: #333 !important;
    margin: 10px 0 !important;
}

.univalle-circle {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    width: 40px !important; 
    height: 40px !important; 
    background-color: rgb(49, 6, 16) !important;
    border-radius: 50% !important;
    margin: 0 0px !important; 
    margin-right: 10% !important;
}

.univalle-circle i {
    color: #fff !important; 
    font-size: 20px !important; 
    cursor: pointer !important;
}

.univalle-circle img {
    border-radius: 50% !important;
    width: 100% !important;
    height: 100% !important;
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
    document.getElementById('univalle-backButton').addEventListener('click', function (event) {
        // Verificar si el clic fue realizado en el ícono de flecha izquierda
        if (event.target.closest('.fa-arrow-left')) {
            // Realizar la acción deseada, por ejemplo, volver atrás en la historia del navegador
            window.history.back();
        }
    });
</script>

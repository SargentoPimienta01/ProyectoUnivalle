<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ Vite::asset('resources/css/gabinetemedicoynaf/styles.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>Univalle</title>
    
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home') }}" class="nav-button nav-left">
            <div class="circle"><i class="fas fa-home"></i></div>
        </a>
        <a href="{{ route('home') }}" class="nav-button nav-left">
            <div class="circle"><i class="fas fa-arrow-left"></i></div>
        </a>
        
        <h2 class="nav-center">GABINETE MEDICO</h2>
        <a href="{{ route('home') }}" class="nav-button nav-right">
            <div class="circle"><i class="fas fa-sign-in-alt"></i></div>
        </a>
    </div>
    <div class="contenedor">
        <div class="cuadroInformativo">
            <div class="contenido">
                <div class="tituloInf">
                    <h3>ATENCION MEDICA GENERAL A ESTUDIANTES</h3>
                </div>
                <div class="parrafoInf">
                    <p>Personal administrativo, docentes, seguridad, limpieza Univalle.</p>
                </div>
                <div class="subTitulo">
                    <p>Requisitos</p>
                </div>
                <div class="parrafoInf">
                    <p>Credencial Universitario</p>
                </div>
            </div>
        </div>
    
        <div class="cuadroInformativo">
            <div class="contenido">
                <div class="tituloInf">
                    <h3>ATENCION MEDICA A PERSONAS EXTERNAS</h3>
                </div>
                <div class="parrafoInf">
                    <p>Padres de familia, pacientes clínica odontológica solo en casos de emergencia.</p>
                </div>
                <div class="subTitulo">
                    <p>Requisitos</p>
                </div>
                <div class="parrafoInf">
                    <p>-----</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

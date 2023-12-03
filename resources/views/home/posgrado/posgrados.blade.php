@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet" type="text/css" />
    <title>Univalle</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .header {
            text-align: center;
            background-color: #68091F;
            color: #f0f0f0;
            padding: 10px;
        }

        .info-box {
            background-color: #68091F;
            border: 3px solid #ccc;
            border-radius: 10px;
            padding: 15px 20px;
            margin: 20px;
        }

        .info-box p {
            font-size: 17px;
            color: #f0f0f0;
        }

        .contenedor {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .cuadroInformativo {
            margin: 10px;
        }

        .cuadroInformativo h3 {
            text-align: center;
        }

        .cuadroInformativo p {
            text-align: justify;
        }

        .link-no-style {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>POSTGRADO</h2>
    </div>
    <div class="info-box">
        <p>En Postgrado Univalle contarás con un amplio portafolio de Programas enfocados a satisfacer tus necesidades académicas actuales. La calidad de nuestros programas está sustentada en la experiencia académica de los profesores, combinada con su desempeño en el mundo laboral actual.</p>
    </div>

    <div class="contenedor">
        <a href="{{ route('posgrado.doctorado') }}" class="link-no-style">
            <div class="cuadroInformativo PROGRAMAS">
                <div class="tituloInf">
                    <h3>Doctorados</h3>
                </div>
                <div class="parrafoInf">
                    <p>
                        El grado de Doctor se confiere al doctorando que ha obtenido un grado de Magister en la respectiva disciplina y que ha aprobado un programa de correspondiente, acreditando que quien lo posee, tiene competencias necesarias para efectuar investigaciones originales. El Programa de Doctorado contempla necesariamente la elaboración presentación sustentación, defensa y aprobación de una tesis doctoral, consistente en una investigación original desarrollada en forma autónoma y que signifique una contribución a la disciplina de que se trate.
                    </p>
                </div>
            </div>
        </a>

        <a href="{{ route('posgrado.maestria') }}" class="link-no-style">
            <div class="cuadroInformativo PROGRAMAS">
                <div class="tituloInf">
                    <h3>Maestrias</h3>
                </div>
                <div class="parrafoInf">
                    <p>
                        Los Programas de Maestría brindan conocimientos, destrezas y habilidades en diferentes campos y disciplinas científicos. Tiene como sustento el entrenamiento sistemático y riguroso en métodos, técnicas y procedimientos de investigación, los mismos que permiten al maestrante organizar el proceso de construcción de conocimientos en diferentes áreas y disciplinas de la ciencia y la tecnología.
                    </p>
                </div>
            </div>
        </a>

        <a href="{{ route('posgrado.diplomado') }}" class="link-no-style">
            <div class="cuadroInformativo PROGRAMAS">
                <div class="tituloInf">
                    <h3>Diplomados</h3>
                </div>
                <div class="parrafoInf">
                    <p>
                        Los Programas de Maestría brindan conocimientos, destrezas y habilidades en diferentes campos y disciplinas científicos. Tiene como sustento el entrenamiento sistemático y riguroso en métodos, técnicas y procedimientos de investigación, los mismos que permiten al maestrante organizar el proceso de construcción de conocimientos en diferentes áreas y disciplinas de la ciencia y la tecnología.
                    </p>
                </div>
            </div>
        </a>
    </div>
</body>

</html>

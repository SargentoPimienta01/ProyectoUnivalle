<style>
    /* Estilo para la paginación */
    .pagination {
        margin-top: 20px; /* Ajusta el margen superior según tus necesidades */
        text-align: center;
        position: relative; /* Añadido para posicionar los botones "previous" y "next" */
    }

    /* Estilo para los botones de la paginación */
    .pagination li {
        display: inline-block;
        margin-right: 5px; /* Espaciado entre los elementos de la paginación */
        box-sizing: border-box; /* Asegura que el tamaño total incluye el relleno y el borde */

        /* Estilos para hacer los botones más grandes y círculo verde */
        font-size: 50px; /* Ajusta el tamaño de la fuente según tus necesidades */
        width: 40px; /* Ajusta el ancho del botón según tus necesidades */
        height: 40px; /* Ajusta la altura del botón según tus necesidades */
        line-height: 40px; /* Añadido para centrar el contenido verticalmente */
        border-radius: 50%; /* Hace que los botones tengan forma de círculo */
        background-color: green; /* Color de fondo verde */

        /* Estilos para que los botones floten */
        float: left;
        position: relative; /* Añadido para posicionar el contenido relativo al botón */

        /* Estilo para el hover */
        transition: background-color 0.3s ease; /* Efecto de transición suave */
    }

    /* Cambio de color al pasar el ratón sobre el botón */
    .pagination li:hover {
        background-color: darkgreen; /* Cambia el color de fondo en el hover */
    }

    /* Estilo para los enlaces dentro de los botones */
    .pagination li a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        text-decoration: none; /* Quita el subrayado predeterminado de los enlaces */
        color: white; /* Color del texto blanco para contrastar con el fondo verde */
        position: absolute; /* Añadido para posicionar el texto relativo al botón */
    }

    /* Estilo para el contenedor de paginación */
    .pagination-container {
        margin-right: 20px; /* Margen derecho de 20px para el contenedor de paginación */
    }
</style>

@if ($paginator->hasPages())
    <ul class="pagination pagination-container"> <!-- Agregado el contenedor de paginación -->
        {{-- Anterior Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next"> <!-- Agregado la clase 'next' para el botón "next" -->
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif

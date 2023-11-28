@extends('layouts.backspace')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria Menu</title>

    <link href="{{ Vite::asset('resources/css/cafeteria.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="mt-5 container-fluid">
    <div class="menu-container">
        <h1>Menú<span>El cafecito</span></h1>
    </div>
   
    <div class="menu-category">
        <div class="category-header">
            <h2>Jugos y batidos</h2>
        </div>
        <table class="table menu-table">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/jugos/durazno.jpg') }}" alt="Club Sandwich"></td>
                <td>Durazno</td>
                <td>Agua - leche</td>
                <td class="menu-item-price">8 Bs - 9 Bs</td>
            </tr>


            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/jugos/frutilla.jpg') }}" alt="Club Sandwich"></td>
                <td>Frutilla</td>
                <td>Agua - leche</td>
                <td class="menu-item-price">8 Bs - 9 Bs</td>
            </tr>


            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/jugos/mora.jpg') }}" alt="Club Sandwich"></td>
                <td>Mora</td>
                <td>Agua - leche</td>
                <td class="menu-item-price">8 Bs - 9 Bs</td>
            </tr>

            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/jugos/platano_oreo.jpg') }}" alt="Club Sandwich"></td>
                <td>Platano con oreo</td>
                <td>Agua - leche</td>
                <td class="menu-item-price">8 Bs - 9 Bs</td>
            </tr>


            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/jugos/piña.jpg') }}" alt="Club Sandwich"></td>
                <td>Piña</td>
                <td>Agua - leche</td>
                <td class="menu-item-price">8 Bs - 9 Bs</td>
            </tr>


            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/jugos/papaya.jpg') }}" alt="Club Sandwich"></td>
                <td>Papaya</td>
                <td>Agua - leche</td>
                <td class="menu-item-price">8 Bs - 9 Bs</td>
            </tr>


            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/jugos/manzana.jpg') }}" alt="Club Sandwich"></td>
                <td>Manzana</td>
                <td>Agua - leche</td>
                <td class="menu-item-price">8 Bs - 9 Bs</td>
            </tr>


            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/jugos/sandia.jpg') }}" alt="Club Sandwich"></td>
                <td>Sandia</td>
                <td>Agua - leche</td>
                <td class="menu-item-price">8 Bs - 9 Bs</td>
            </tr>


            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/jugos/limonada.jpg') }}" alt="Club Sandwich"></td>
                <td>Limonada</td>
                <td>Agua</td>
                <td class="menu-item-price">8 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/jugos/limonada_hierva.jpg') }}" alt="Club Sandwich"></td>
                <td>Limonada con hierva buena, apio-manzana-hierva buena.</td>
                <td>Agua </td>
                <td class="menu-item-price">7 bs.</td>
            </tr>


            </tr>
        </tbody>
    </table>
</div>

<div class="menu-category">
    <div class="category-header">
        <h2>Postres</h2>
    </div>
    <table class="table menu-table">
        <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/postres/mil_shake.jpg') }}" alt="Iced Coffee"></td>
                <td>Milk Shake</td>
                <td>Frapeado de frutilla-piña-papaya</td>
                <td class="menu-item-price">12 Bs</td>
            </tr>

            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/postres/helado_brownie.jpg') }}" alt="Fruit Smoothie"></td>
                <td>Helado con brownie</td>
                <td>Porción de torta con helado</td>
                <td class="menu-item-price">10 Bs</td>
            </tr>

            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/postres/banana_split.jpg') }}"></td>
                <td>Banana Split</td>
                <td>3 porciones de helado acompañado de plátanos y chocolates</td>
                <td class="menu-item-price">12 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/postres/wafles.jpg') }}" alt="Fruit Smoothie"></td>
                <td>Wafles con helado</td>
                <td>2 porciones de wafles acompañado con 2 sabores de helado y frutas de estación.</td>
                <td class="menu-item-price">16 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/postres/melva.jpg') }}" alt="Fruit Smoothie"></td>
                <td>Copa melba</td>
                <td>Copa a elección pequeño - grande</td>
                <td class="menu-item-price">10 Bs. - 15 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="{{ Vite::asset('resources/img/postres/chocolate.jpg') }}" alt="Fruit Smoothie"></td>
                <td>Copa de chocolate y oreo</td>
                <td>Copa a elección pequeño - grande</td>
                <td class="menu-item-price">10 Bs. - 15 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/postres/frutilla.jpg" alt="Fruit Smoothie"></td>
                <td>Copa de frutilla de cherrys</td>
                <td>Copa a elección pequeño - grande</td>
                <td class="menu-item-price">10 Bs. - 15 Bs.</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="menu-category">
    <div class="category-header">
        <h2>Cafeteria</h2>
    </div>
    <table class="table menu-table">
        <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr class="menu-item">
                <td><img src="img/cafeteria/capuchino.jpg" alt="Iced Coffee"></td>
                <td>Capuchino</td>
                <td>Pequeño - Grande</td>
                <td class="menu-item-price">8 Bs - 10 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/cafeteria/mokachino.jpg" alt="Iced Coffee"></td>
                <td>Mokaccino</td>
                <td>Pequeño - Grande</td>
                <td class="menu-item-price">8 Bs - 10 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/cafeteria/expreso.jpg" alt="Fruit Smoothie"></td>
                <td>Expreso</td>
                <td>Pequeño - Grande</td>
                <td class="menu-item-price">7 Bs - 9 Bs.</td></td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/cafeteria/cafe.jpg" alt="Fruit Smoothie"></td>
                <td>Café con leche</td>
                <td>Pequeño - Grande</td>
                <td class="menu-item-price">6 Bs - 8 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/cafeteria/tody_leche.jpg" alt="Fruit Smoothie"></td>
                <td>Toddy con leche</td>
                <td>Pequeño - Grande</td>
                <td class="menu-item-price">6 Bs - 8 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/cafeteria/tody.jpg" alt="Fruit Smoothie"></td>
                <td>Toddy</td>
                <td>Pequeño - Grande</td>
                <td class="menu-item-price">4 Bs. - 6 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/cafeteria/destilado.jpg" alt="Fruit Smoothie"></td>
                <td>Destilado</td>
                <td>-</td>
                <td class="menu-item-price">5 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/cafeteria/temate.jpg" alt="Fruit Smoothie"></td>
                <td>Té-mate</td>
                <td>-</td>
                <td class="menu-item-price">5 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/cafeteria/sultana.jpg" alt="Fruit Smoothie"></td>
                <td>Sultana</td>
                <td>-</td>
                <td class="menu-item-price">5 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/cafeteria/especialidad.jpg" alt="Fruit Smoothie"></td>
                <td>Café con especialidad</td>
                <td>-</td>
                <td class="menu-item-price">10 Bs. - 12 Bs.</td>
            </tr>

        </tbody>

            
    </table>
</div>


<div class="menu-category">
    <div class="category-header">
        <h2>Combos desayunos</h2>
    </div>
    <table class="table menu-table">
        <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr class="menu-item">
                <td><img src="img/combos desayunos/paceño.jpg" alt="Iced Coffee"></td>
                <td>Paceño</td>
                <td>Pan marraqueta, queso y café.</td>
                <td class="menu-item-price">8 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/combos desayunos/break.jpg" alt="Fruit Smoothie"></td>
                <td>Break de huevos</td>
                <td>Omelette de verduras, tostadas, café y jugo.</td>
                <td class="menu-item-price">14 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/combos desayunos/omelet.jpg" alt="Fruit Smoothie"></td>
                <td>Omelette de carne</td>
                <td>Omelete de relleno de carne picada y jamón, tostaadas y café.</td>
                <td class="menu-item-price">15 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/combos desayunos/revueltos.jpg" alt="Fruit Smoothie"></td>
                <td>Revueltos de huevos</td>
                <td>Acompañado de jamén, tomate, cebollin, tostadas, café y jugo.</td>
                <td class="menu-item-price">13 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/combos desayunos/americano.jpg" alt="Fruit Smoothie"></td>
                <td>Americano</td>
                <td>Tostadas, huevos revueltos, tocino, mermelada, mantequilla, café y jugo.</td>
                <td class="menu-item-price">17 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/combos desayunos/ranchero.jpg" alt="Fruit Smoothie"></td>
                <td>Ranchero</td>
                <td>Pan casero, salteado de carne con verduras, papas fritas, café o te.</td>
                <td class="menu-item-price">15 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/combos desayunos/continental.jpg" alt="Fruit Smoothie"></td>
                <td>Continental</td>
                <td>Jamón, queso, tostadas, huevos, mermelada, mantequilla y café.</td>
                <td class="menu-item-price">15 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/combos desayunos/wafles.jpg" alt="Fruit Smoothie"></td>
                <td>Waffles</td>
                <td>3 unidades. Acompañado de frutas de estacion, jarabe de chocolate, cafe o te.</td>
                <td class="menu-item-price">15 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/combos desayunos/panqueques.jpg" alt="Fruit Smoothie"></td>
                <td>Panqueques</td>
                <td>3 unidades. Acompañado de frutas de estacion, jarabe de chocolate, café o té.</td>
                <td class="menu-item-price">14 Bs.</td>
            </tr>

        </tbody>
    </table>
</div>


<div class="menu-category">
    <div class="category-header">
        <h2>Sandwiches</h2>
    </div>
    <table class="table menu-table">
        <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr class="menu-item">
                <td><img src="img/sandwiches/jamon_queso.jpg"></td>
                <td>Jamon y queso caliente</td>
                <td>Jamon y queso y pan miga</td>
                <td class="menu-item-price">6 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/sandwiches/jamon.jpg" alt="Fruit Smoothie"></td>
                <td>Jamon y queso frío</td>
                <td>Lechuga, tomate, aderezos y pan miga</td>
                <td class="menu-item-price">7 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/sandwiches/crocmadame.jpg" alt="Fruit Smoothie"></td>
                <td>Croc Madame</td>
                <td>3 capas de pan miga, jamón, queso mozarella y salsa bechamel.</td>
                <td class="menu-item-price">10 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/sandwiches/lomito_res.jpg" alt="Fruit Smoothie"></td>
                <td>Lomito de res/huevo</td>
                <td>Pan lechuga, tomate y aderezos.</td>
                <td class="menu-item-price">10 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/sandwiches/limito_jamon.jpg" alt="Fruit Smoothie"></td>
                <td>Lomito con queso y jamón</td>
                <td>Pan lechuga, tomate y aderezos.</td>
                <td class="menu-item-price">10 Bs.</td>
            </tr> 

            <tr class="menu-item">
                <td><img src="img/sandwiches/pollo.jpg"></td>
                <td>Pollo a la plancha</td>
                <td>Pan, lechuga, tomate, cebolla en vinagre y aderezos.</td>
                <td class="menu-item-price">10 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/sandwiches/atun.jpg"></td>
                <td>Pasta atún</td>
                <td>Pan blanco o integral, lechuga, pasta atún y tomate.</td>
                <td class="menu-item-price">10 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/sandwiches/triple.jpg"></td>
                <td>Triple de palta y huevo</td>
                <td>3 capas de pan miga, palta, tomate, huevo frito y queso</td>
                <td class="menu-item-price">9 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/sandwiches/tocino.jpg"></td>
                <td>Huevo y tocino</td>
                <td>-</td>
                <td class="menu-item-price">$7 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/sandwiches/milanesa.jpg" alt="Fruit Smoothie"></td>
                <td>Milanesa de pollo</td>
                <td>Pan, lechuga, tomate y aderezos.</td>
                <td class="menu-item-price">$8 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/sandwiches/napolitana.jpg" alt="Fruit Smoothie"></td>
                <td>Napolitana</td>
                <td>Pan, milaneza de pollo, lechuga, tomate, jamón y queso.</td>
                <td class="menu-item-price">$10 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/sandwiches/choripan.jpg" alt="Fruit Smoothie"></td>
                <td>Choripán</td>
                <td>Pan, lechuga, cebolla en vinagre, tomate y aderezos.</td>
                <td class="menu-item-price">$10 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/sandwiches/pizza.jpg" alt="Fruit Smoothie"></td>
                <td>Pan pizza</td>
                <td>Pan molde, chorizo, salsa de tomate y orégano.</td>
                <td class="menu-item-price">$8 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/sandwiches/huevo.jpg" alt="Fruit Smoothie"></td>
                <td>Sandnwich de huevo</td>
                <td></td>
                <td class="menu-item-price">$4 Bs.</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="menu-category">
    <div class="category-header">
        <h2>Especiales</h2>
    </div>
    <table class="table menu-table">
        <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr class="menu-item">
                <td><img src="img/Especiales/clasica.jpg" alt="Iced Coffee"></td>
                <td>Hamburguesa clasica</td>
                <td>Pan, carne de res, lechuga, tomate, queso y papas fritas.</td>
                <td class="menu-item-price">13 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/Especiales/bbq.jpg" alt="Iced Coffee"></td>
                <td>Hamburguesa BBQ</td>
                <td>Pan, carne de res, lechuga, tomate, pepinillos, salsa y papas fritas.</td>
                <td class="menu-item-price">18 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/Especiales/porky.jpg" alt="Iced Coffee"></td>
                <td>Porky Guesa</td>
                <td>Pan, carne de res, tomate, lechuga, salsa, crispis de cebolla, tocino y papas fritas.</td>
                <td class="menu-item-price">20 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/Especiales/choriburguer.jpg" alt="Iced Coffee"></td>
                <td>Choriburguer</td>
                <td>Pan, carne de res, chorizo, lechuga, tomate, cebolla y salsa de ajo.</td>
                <td class="menu-item-price">20 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/Especiales/texmex.jpg" alt="Iced Coffee"></td>
                <td>Tex Mex</td>
                <td>Pan, carne de res, palta, pico de gallo, nacho, queso mozarella y papas fritas.</td>
                <td class="menu-item-price">20 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/Especiales/suizo.jpg" alt="Iced Coffee"></td>
                <td>Sandwich suizo</td>
                <td>Pan, carne de res, crema de leche, champiñones, cebolla, salsa de soya, queso mozarella y papas fritas.</td>
                <td class="menu-item-price">22 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/Especiales/pique.jpg"></td>
                <td>Pan pique</td>
                <td>Salteado de carne con cebolla, tomate y salchipapa, acompañado con papas fritas.</td>
                <td class="menu-item-price">15 Bs.</td>
            </tr>

            
            <tr class="menu-item">
                <td><img src="img/Especiales/salchipapa.jpg"></td>
                <td>Salchipapa</td>
                <td>-</td>
                <td class="menu-item-price">12 Bs.</td>
            </tr>


            <tr class="menu-item">
                <td><img src="img/Especiales/salchiburguer.jpg" alt="Iced Coffee"></td>
                <td>Salchiburguer</td>
                <td>-</td>
                <td class="menu-item-price">17 Bs.</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="menu-category">
    <div class="category-header">
        <h2>Ensaladas</h2>
    </div>
    <table class="table menu-table">
        <thead>
            <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr class="menu-item">
                <td><img src="img/ensaladas/cesar.jpg" alt="Iced Coffee"></td>
                <td>Ensalada Cesar</td>
                <td>Mix de lechugas, pollo a la plancha, croutons, queso parmesano, salsa de ajo y tomates.</td>
                <td class="menu-item-price">15 Bs.</td>
            </tr>
            <tr class="menu-item">
                <td><img src="img/ensaladas/valle.jpg" alt="Fruit Smoothie"></td>
                <td>Ensalada del valle</td>
                <td>Mix de lechugas, suprema de pollo, zanahoria, tomates, queso criollo, tostadas y salsa de ajo</td>
                <td class="menu-item-price">15 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/ensaladas/verdulera.jpg" alt="Fruit Smoothie"></td>
                <td>Ensalada verdulrera</td>
                <td>Mix de lechugas,pollo a la plancha, palta, choclitos, jamón, tomates asados, zuchiny, salsa de albahaca.</td>
                <td class="menu-item-price">17 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/ensaladas/ensaladadeatun.jpg" alt="Fruit Smoothie"></td>
                <td>Ensalada de atún</td>
                <td>Mix de lechugas,atún, huevo duro, rabanitos, queso criollo, tomates, maní tostado y choclitos.</td>
                <td class="menu-item-price">16 Bs.</td>
            </tr>

            <tr class="menu-item">
                <td><img src="img/ensaladas/mexicana.jpg" alt="Fruit Smoothie"></td>
                <td>Ensalada mexicana</td>
                <td>Mix de lechugas, palta, pico de gallo, choclitos, nachos, pollo a la plancha y aderezo de queso.</td>
                <td class="menu-item-price">17 Bs.</td>
            </tr>
            </tbody>

    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>


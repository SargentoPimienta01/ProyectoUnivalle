<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            'nombre' => 'Durazno',
            'descripcion' => 'Un jugo de durazno. Agua - leche.',
            'precio' => 9,
            'foto' => 'https://quebuenasazon.com/wp-content/uploads/2018/08/receta-jugo-de-durazno.jpg',
            'id_categoria' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Frutilla',
            'descripcion' => 'Agua - leche',
            'precio' => 9,
            'foto' => 'https://recetas.easyways.cl/img/fotoRecetas/20220429094239jugo-de-frutillas.jpg',
            'id_categoria' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Café Americano',
            'descripcion' => 'Un café suave y aromático.',
            'precio' => 2.50,
            'foto' => 'https://perfectdailygrind.com/wp-content/uploads/2020/08/Filter-or-Americano-2.jpg',
            'id_categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Mora',
            'descripcion' => 'Agua - leche',
            'precio' => 9,
            'foto' => 'https://www.comidascolombianas.com/wp-content/uploads/jugo-de-mora.jpg',
            'id_categoria' => 1,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Platano con oreo',
            'descripcion' => 'Agua - leche',
            'precio' => 9,
            'foto' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRU-0TZEbmzDGWhra2G84SQDwVs87SmsJJsVS_uARfZ0KZ1DQW3',
            'id_categoria' => 1,
        ]);
        
        DB::table('productos')->insert([
            'nombre' => 'Piña',
            'descripcion' => 'Agua - leche',
            'precio' => 9,
            'foto' => 'https://cdn0.recetasgratis.net/es/posts/1/8/8/jugo_de_pina_y_limon_42881_600.webp',
            'id_categoria' => 1,
        ]);
        
        DB::table('productos')->insert([
            'nombre' => 'Papaya',
            'descripcion' => 'Agua - leche',
            'precio' => 9,
            'foto' => 'https://cdn2.cocinadelirante.com/1020x600/filters:format(webp):quality(75)/sites/default/files/images/2018/09/beneficios-del-jugo-de-papaya.jpg',
            'id_categoria' => 1,
        ]);
        
        DB::table('productos')->insert([
            'nombre' => 'Manzana',
            'descripcion' => 'Agua - leche',
            'precio' => 9,
            'foto' => 'https://img.freepik.com/fotos-premium/vaso-jugo-manzana-manzanas-rojas-mesa-madera_35378-2248.jpg?w=996',
            'id_categoria' => 1,
        ]);
        
        DB::table('productos')->insert([
            'nombre' => 'Sandia',
            'descripcion' => 'Agua - leche',
            'precio' => 9,
            'foto' => 'https://www.conasi.eu/blog/wp-content/uploads/2014/07/zumo-de-sand%C3%ADa-1.jpg',
            'id_categoria' => 1,
        ]);
        
        DB::table('productos')->insert([
            'nombre' => 'Limonada',
            'descripcion' => 'Agua',
            'precio' => 8,
            'foto' => 'https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/media/image/2022/07/agua-limon-2759563.jpg?tf=1200x',
            'id_categoria' => 1,
        ]);
        
        DB::table('productos')->insert([
            'nombre' => 'Limonada con hierva buena, apio-manzana-hierva buena.',
            'descripcion' => 'Agua',
            'precio' => 7,
            'foto' => 'https://www.gastrolabweb.com/u/fotografias/m/2023/1/19/f685x385-41103_78796_5050.jpg',
            'id_categoria' => 1,
        ]);

        // Seeder para postres
        DB::table('productos')->insert([
            'nombre' => 'Milk Shake',
            'descripcion' => 'Frapeado de frutilla-piña-papaya',
            'precio' => 12,
            'foto' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcS8iGqZBHjdgvJ_7XBPcYQchncfRfLbMIUXWeC3IyCNC6jWaftP',
            'id_categoria' => 2,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Helado con brownie',
            'descripcion' => 'Porción de torta con helado',
            'precio' => 10,
            'foto' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRbd7X2BSLvuMP37lMpuM2XguOJIR7HedbvRhW3ytRp67gwE5ir',
            'id_categoria' => 2,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Banana Split',
            'descripcion' => '3 porciones de helado acompañado de plátanos y chocolates',
            'precio' => 12,
            'foto' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQLEfKSkp8P_CV8BZ2LJh5HcC2gK2gB2haorHsKXe7ltBqvdwN8',
            'id_categoria' => 2,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Wafles con helado',
            'descripcion' => '2 porciones de wafles acompañado con 2 sabores de helado y frutas de estación.',
            'precio' => 16,
            'foto' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiDRxVbl_eeVkAlBhxygdf4s0NqIjcaaJrdp4wvgbANviLOozO',
            'id_categoria' => 2,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Copa melba',
            'descripcion' => 'Copa a elección pequeño - grande',
            'precio' => 10,
            'foto' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcS6XUW4dMD-hywuaYIzCAXTLozfYUKN8Se3DIxTjHOzuDVJfzhX',
            'id_categoria' => 2,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Copa de chocolate y oreo',
            'descripcion' => 'Copa a elección pequeño - grande',
            'precio' => 10,
            'foto' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcT2lPBXTogOACGSrauISyH7KHHcvc82q2GGPrrpuzRDIG64TjGR',
            'id_categoria' => 2,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Copa de frutilla de cherrys',
            'descripcion' => 'Copa a elección pequeño - grande',
            'precio' => 10,
            'foto' => 'https://i.ytimg.com/vi/jF-fiC52qxk/maxresdefault.jpg',
            'id_categoria' => 2,
        ]);

        // Seeder para cafetería
        DB::table('productos')->insert([
            'nombre' => 'Cappuccino',
            'descripcion' => 'Café con partes iguales de café, leche vaporizada y espuma de leche.',
            'precio' => 8.00,
            'foto' => 'https://upload.wikimedia.org/wikipedia/commons/0/00/Cappuccino_PeB.jpg',
            'id_categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Café Latte',
            'descripcion' => 'Café con leche vaporizada y una capa de espuma.',
            'precio' => 3.50,
            'foto' => 'https://clubdelcafe.net/wp-content/uploads/2020/05/taza-de-caf%C3%A9-latte-1024x683.jpg',
            'id_categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Mokaccino',
            'descripcion' => 'Pequeño - Grande',
            'precio' => 8,
            'foto' => 'https://es.cocktail.fabbri1905.com/imgpub/128752/0/0/ricetta_caff_mokaccino.jpg',
            'id_categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Expreso',
            'descripcion' => 'Pequeño - Grande',
            'precio' => 7,
            'foto' => 'https://es.cocktail.fabbri1905.com/imgpub/128752/0/0/ricetta_caff_mokaccino.jpg',
            'id_categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Café con leche',
            'descripcion' => 'Pequeño - Grande',
            'precio' => 6,
            'foto' => 'https://i.blogs.es/421374/cafe-con-leche2/1366_2000.jpg',
            'id_categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Toddy con leche',
            'descripcion' => 'Pequeño - Grande',
            'precio' => 6,
            'foto' => 'https://i.blogs.es/197486/chocolate_milk/650_1200.jpg',
            'id_categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Toddy',
            'descripcion' => 'Pequeño - Grande',
            'precio' => 4,
            'foto' => 'https://pbs.twimg.com/media/DEvvjSVXkAA9pRb.jpg',
            'id_categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Destilado',
            'descripcion' => '-',
            'precio' => 5,
            'foto' => '',
            'id_categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Té-mate',
            'descripcion' => '-',
            'precio' => 5,
            'foto' => '',
            'id_categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Sultana',
            'descripcion' => '-',
            'precio' => 5,
            'foto' => '',
            'id_categoria' => 3,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Café con especialidad',
            'descripcion' => '-',
            'precio' => 10,
            'foto' => 'https://www.cronista.com/files/image/506/506172/63c948f2b5118_700_462!.jpg?s=9db765f5efc95c0d25cdd7d7d105dfe8&d=1674135796',
            'id_categoria' => 3,
        ]);

        // Seeder para combos de desayuno
        DB::table('productos')->insert([
            'nombre' => 'Paceño',
            'descripcion' => 'Pan marraqueta, queso y café.',
            'precio' => 8,
            'foto' => '',
            'id_categoria' => 4,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Break de huevos',
            'descripcion' => 'Omelette de verduras, tostadas, café y jugo.',
            'precio' => 14,
            'foto' => 'https://c8.alamy.com/compes/2bkp1cf/desayuno-en-la-cafeteria-tortilla-con-salchichas-tostadas-y-un-vaso-de-zumo-fresco-deliciosa-tortilla-con-jamon-y-guisantes-para-decorar-tortilla-y-un-vaso-de-2bkp1cf.jpg',
            'id_categoria' => 4,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Omelette de carne',
            'descripcion' => 'Omelete de relleno de carne picada y jamón, tostaadas y café.',
            'precio' => 15,
            'foto' => 'img/combos desayunos/omelet.jpg',
            'id_categoria' => 4,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Revueltos de huevos',
            'descripcion' => 'Acompañado de jamén, tomate, cebollin, tostadas, café y jugo.',
            'precio' => 13,
            'foto' => 'https://i.ytimg.com/vi/Ho_DLT-Sheo/maxresdefault.jpg',
            'id_categoria' => 4,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Americano',
            'descripcion' => 'Tostadas, huevos revueltos, tocino, mermelada, mantequilla, café y jugo.',
            'precio' => 17,
            'foto' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS78CzR6v2Mh424Znntj5P9HAWWA4MdmEKlk6p7LkQ2RLWz0f5Kn_nyG7t_8Bi2vgpytnA&usqp=CAU',
            'id_categoria' => 4,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Ranchero',
            'descripcion' => 'Pan casero, salteado de carne con verduras, papas fritas, café o te.',
            'precio' => 15,
            'foto' => '',
            'id_categoria' => 4,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Continental',
            'descripcion' => 'Jamón, queso, tostadas, huevos, mermelada, mantequilla y café.',
            'precio' => 15,
            'foto' => '',
            'id_categoria' => 4,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Waffles',
            'descripcion' => '3 unidades. Acompañado de frutas de estacion, jarabe de chocolate, cafe o te.',
            'precio' => 15,
            'foto' => '',
            'id_categoria' => 4,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Panqueques',
            'descripcion' => '3 unidades. Acompañado de frutas de estacion, jarabe de chocolate, café o té.',
            'precio' => 14,
            'foto' => '',
            'id_categoria' => 4,
        ]);

        // Seeder para sandwiches con fotos vacías
        DB::table('productos')->insert([
            'nombre' => 'Jamon y queso caliente',
            'descripcion' => 'Jamon y queso y pan miga',
            'precio' => 6,
            'foto' => '', 
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Jamon y queso frío',
            'descripcion' => 'Lechuga, tomate, aderezos y pan miga',
            'precio' => 7,
            'foto' => '', 
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Croc Madame',
            'descripcion' => '3 capas de pan miga, jamón, queso mozarella y salsa bechamel.',
            'precio' => 10,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Lomito de res/huevo',
            'descripcion' => 'Pan lechuga, tomate y aderezos.',
            'precio' => 10,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Lomito con queso y jamón',
            'descripcion' => 'Pan lechuga, tomate y aderezos.',
            'precio' => 10,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pollo a la plancha',
            'descripcion' => 'Pan, lechuga, tomate, cebolla en vinagre y aderezos.',
            'precio' => 10,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pasta atún',
            'descripcion' => 'Pan blanco o integral, lechuga, pasta atún y tomate.',
            'precio' => 10,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Triple de palta y huevo',
            'descripcion' => '3 capas de pan miga, palta, tomate, huevo frito y queso',
            'precio' => 9,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Huevo y tocino',
            'descripcion' => '-',
            'precio' => 7,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Milanesa de pollo',
            'descripcion' => 'Pan, lechuga, tomate y aderezos.',
            'precio' => 8,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Napolitana',
            'descripcion' => 'Pan, milaneza de pollo, lechuga, tomate, jamón y queso.',
            'precio' => 10,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Choripán',
            'descripcion' => 'Pan, lechuga, cebolla en vinagre, tomate y aderezos.',
            'precio' => 10,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pan pizza',
            'descripcion' => 'Pan molde, chorizo, salsa de tomate y orégano.',
            'precio' => 8,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Sandwich de huevo',
            'descripcion' => '',
            'precio' => 4,
            'foto' => '',
            'id_categoria' => 5,
        ]);

        // Seeder para hamburguesas y especiales
        DB::table('productos')->insert([
            'nombre' => 'Hamburguesa clasica',
            'descripcion' => 'Pan, carne de res, lechuga, tomate, queso y papas fritas.',
            'precio' => 13,
            'foto' => '',
            'id_categoria' => 6,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Hamburguesa BBQ',
            'descripcion' => 'Pan, carne de res, lechuga, tomate, pepinillos, salsa y papas fritas.',
            'precio' => 18,
            'foto' => '',
            'id_categoria' => 6,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Porky Guesa',
            'descripcion' => 'Pan, carne de res, tomate, lechuga, salsa, crispis de cebolla, tocino y papas fritas.',
            'precio' => 20,
            'foto' => 'img/Especiales/porky.jpg',
            'id_categoria' => 6,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Choriburguer',
            'descripcion' => 'Pan, carne de res, chorizo, lechuga, tomate, cebolla y salsa de ajo.',
            'precio' => 20,
            'foto' => '',
            'id_categoria' => 6,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Tex Mex',
            'descripcion' => 'Pan, carne de res, palta, pico de gallo, nacho, queso mozarella y papas fritas.',
            'precio' => 20,
            'foto' => '',
            'id_categoria' => 6,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Sandwich suizo',
            'descripcion' => 'Pan, carne de res, crema de leche, champiñones, cebolla, salsa de soya, queso mozarella y papas fritas.',
            'precio' => 22,
            'foto' => '',
            'id_categoria' => 6,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pan pique',
            'descripcion' => 'Salteado de carne con cebolla, tomate y salchipapa, acompañado con papas fritas.',
            'precio' => 15,
            'foto' => '',
            'id_categoria' => 6,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Salchipapa',
            'descripcion' => '-',
            'precio' => 12,
            'foto' => '',
            'id_categoria' => 6,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Salchiburguer',
            'descripcion' => '-',
            'precio' => 17,
            'foto' => '',
            'id_categoria' => 6,
        ]);

        // Seeder para ensaladas
        DB::table('productos')->insert([
            'nombre' => 'Ensalada Cesar',
            'descripcion' => 'Mix de lechugas, pollo a la plancha, croutons, queso parmesano, salsa de ajo y tomates.',
            'precio' => 15,
            'foto' => '',
            'id_categoria' => 7,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Ensalada del valle',
            'descripcion' => 'Mix de lechugas, suprema de pollo, zanahoria, tomates, queso criollo, tostadas y salsa de ajo.',
            'precio' => 15,
            'foto' => '',
            'id_categoria' => 7,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Ensalada verdulrera',
            'descripcion' => 'Mix de lechugas,pollo a la plancha, palta, choclitos, jamón, tomates asados, zuchiny, salsa de albahaca.',
            'precio' => 17,
            'foto' => '',
            'id_categoria' => 7,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Ensalada de atún',
            'descripcion' => 'Mix de lechugas, atún, huevo duro, rabanitos, queso criollo, tomates, maní tostado y choclitos.',
            'precio' => 16,
            'foto' => '',
            'id_categoria' => 7,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Ensalada mexicana',
            'descripcion' => 'Mix de lechugas, palta, pico de gallo, choclitos, nachos, pollo a la plancha y aderezo de queso.',
            'precio' => 17,
            'foto' => '',
            'id_categoria' => 7,
        ]);
    }
}

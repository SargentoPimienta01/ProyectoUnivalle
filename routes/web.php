<?php
  
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\RequisitoCajaController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\CategoriaTramiteController;
use App\Http\Controllers\GabinetesMedicoController;
use App\Http\Controllers\NafController;
use App\Http\Controllers\RequisitosGabinetesMedicoController;
use App\Http\Controllers\RequisitosNafController;
use App\Http\Controllers\RequisitoTramiteController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\PostgradoController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\PlataformaDeAtencionController;
use App\Http\Controllers\bibliotecaController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\CategoriaMenuController;
use App\Http\Controllers\BienestarUniversitarioController;
use App\Http\Controllers\RequisitoBienestarController;
  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
    Route::get('/', function () {
        return redirect('/home');;
    });

    //PDF
    Route::get('/generate-pdf', [PdfController::class, 'generatePDF']);

    Route::get('/generate-qr', [QRCodeController::class, 'generateQrCode']);

    //Images
    Route::get('/subir-imagen', [ImagenController::class, 'index'])->name('subir-imagen');
    Route::post('/subir-imagen', [ImagenController::class, 'subirImagen']);

    Route::get('/home/naf', [HomeController::class, 'naf'])->name('naf');

    Route::get('/home/cafeteria', [HomeController::class, 'cafeteria'])->name('cafeteria');
    Route::get('/home/biblioteca', [HomeController::class, 'biblioteca'])->name('biblioteca');
    Route::get('/home/posgrado', [HomeController::class, 'posgrado'])->name('posgrado');

    Route::get('/home/gabinete-medico', [HomeController::class, 'gabinetemedico'])->name('gabinete-medico');

    Route::get('/home/plataforma-de-atencion/servicios', [HomeController::class, 'paservicios'])->name('paservicios');

    Route::get('/home/plataforma-de-atencion', [HomeController::class, 'plataformadeatencion'])->name('plataforma-de-atencion');

    Route::get('/home/cajas', [HomeController::class, 'cajas'])->name('cajas');

    Route::get('/home/requisitosCaja/{id_caja}/{nombre?}', [HomeController::class, 'requisitosCaja'])
    ->where('id_caja', '[0-9]+')
    ->where('nombre', '[A-Za-z0-9\-]+') // Permite solo letras, números y guiones en el nombre
    ->name('requisitosCaja');


    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/home/tramites', [HomeController::class, 'tramites'])->name('tramites-inicio');

    Route::get('/home/tramites/disponibles/{id_categoria_tramites}/{nombre_categoria?}', [HomeController::class, 'tramitesdisponibles'])
    ->where('id_categoria_tramites', '[0-9]+') // Para asegurar que el ID sea un número
    ->name('tramitesdisponibles');


    Route::get('/home/tramites/{nombre_categoria}', 'TuControlador@tuMetodo')
    ->where('nombre_categoria', '[A-Za-z0-9\-]+')
    ->name('nombre_categoria');

    Route::get('/home/{nombre_area}', 'HomeController@{nombre_area}')->name('nombre_area');

    Route::get('/home/tramites/disponibles/{id_categoria_tramites}/{nombre_categoria?}/requisitos/{id_tramite}/{nombre_tramite?}', [HomeController::class, 'requisitos'])
    ->where('id_categoria_tramites', '[0-9]+')
    ->where('id_tramite', '[0-9]+')
    ->name('requisitos');

    Route::get('/home/tramites/disponibles/{id_categoria_tramites}/{nombre_categoria?}/requisitos/{id_tramite}/{nombre_tramite?}/pdf', [PdfController::class, 'generateRequisitosPdf'])
    ->where('id_categoria_tramites', '[0-9]+')
    ->where('id_tramite', '[0-9]+')
    ->name('requisitos_pdf');

    Auth::routes();
  
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
  
    Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('postgrados', PostgradoController::class);
    Route::resource('plataforma-de-atencions', PlataformaDeAtencionController::class);

    //Bienestar Universitario
    Route::get('/bienestar', [BienestarUniversitarioController::class, 'index'])->name('bienestar.index');
    Route::get('/bienestar/inactivos', [BienestarUniversitarioController::class, 'inactivos'])->name('bienestar.inactivos');
    Route::post('/bienestar', [BienestarUniversitarioController::class, 'store'])->name('bienestar.store');
    Route::put('/bienestar/{bienestar}', [BienestarUniversitarioController::class, 'update'])->name('bienestar.update');
    Route::post('/bienestar/{bienestar}/cambiarEstado', [BienestarUniversitarioController::class, 'cambiarEstado'])->name('bienestar.cambiarEstado');

    // Rutas para la gestión de requisitos de Bienestar
    Route::get('bienestar/{id_bienestar}/requisitos', [RequisitoBienestarController::class, 'index'])
    ->name('requisito-bienestares.index');

    Route::get('bienestar/{id_bienestar}/requisitos/create', [RequisitoBienestarController::class, 'create'])
    ->name('requisito-bienestares.create');

    Route::post('bienestar/{id_bienestar}/requisitos', [RequisitoBienestarController::class, 'store'])
    ->name('requisito-bienestares.store');

    Route::get('bienestar/{id_bienestar}/requisitos/{id}/edit', [RequisitoBienestarController::class, 'edit'])
    ->name('requisito-bienestares.edit');

    Route::put('bienestar/{id_bienestar}/requisitos/{id}', [RequisitoBienestarController::class, 'update'])
    ->name('requisito-bienestares.update');

    Route::get('bienestar/requisitos/inactivos', [RequisitoBienestarController::class, 'inactivos'])
    ->name('requisito-bienestares.inactivos');

    Route::post('bienestar/requisitos/{requisito_bienestar}/cambiar-estado', [RequisitoBienestarController::class, 'cambiarEstado'])
    ->name('requisito-bienestares.cambiarEstado');

    //Ubicaciones
    // Rutas personalizadas primero
    Route::get('/ubicacion/inactivas', [UbicacionController::class, 'inactivas'])->name('admin.ubicacion.inactivas');
    Route::get('/ubicacion/toggleEstado/{id}', [UbicacionController::class, 'toggleEstado'])->name('ubicacion.toggleEstado');

    // Rutas generadas por Route::resource
    Route::resource('ubicacion', UbicacionController::class);

    Route::put('/areas/cambiarEstado/{id}', [AreaController::class, 'cambiarEstado'])->name('areas.cambiarEstado');
    Route::resource('areas', AreaController::class);

    Route::resource('categoria-tramites', CategoriaTramiteController::class);
    
    //Rutas de trámites
    Route::post('tramites/cambiarEstado/{id}', [TramiteController::class, 'cambiarEstado'])->name('tramites.cambiarEstado');
    Route::get('/tramites/inactivos', [TramiteController::class, 'inactivos'])->name('tramites.inactivos');
    //Route::resource('tramites', TramiteController::class);
    Route::resource('tramites', TramiteController::class)->names('tramites');

    Route::put('/categoria-tramites/{id}/cambiarEstado', [CategoriaTramiteController::class, 'cambiarEstado'])->name('categoria-tramites.cambiarEstado');
    Route::resource('categoria-tramites', CategoriaTramiteController::class);
    //Requisitos de trámites
    // Primero definir las rutas específicas antes de las rutas con parámetros
    Route::get('tramites/requisito-tramites/inactivos', [RequisitoTramiteController::class, 'inactivos'])->name('requisito-tramites.inactivos');
    Route::get('tramites/requisito-tramites/{id_tramite}', [RequisitoTramiteController::class, 'index'])->name('requisito-tramites.index');

    // Ahora, las rutas generales o las rutas con parámetros
    Route::resource('tramites/requisito-tramites', RequisitoTramiteController::class);
    Route::put('tramites/requisito-tramites/cambiarEstado/{requisito}', [RequisitoTramiteController::class, 'cambiarEstado'])->name('requisito-tramites.cambiarEstado');

    // Rutas específicas para Cajas antes de las generales
    Route::get('cajas/inactivas', [CajaController::class, 'inactivas'])->name('cajas.inactivas');

    // Rutas generales o con parámetros para Cajas
    Route::resource('cajas', CajaController::class);
    Route::put('cajas/cambiarEstado/{caja}', [CajaController::class, 'cambiarEstado'])->name('cajas.cambiarEstado');

    // Rutas para Requisitos de Cajas
    Route::post('cajas/requisitos', [RequisitoCajaController::class, 'store'])->name('requisito-cajas.store');
    Route::get('cajas/requisitos/{id_caja}', [RequisitoCajaController::class, 'index'])->name('cajas.requisitos.index');
    Route::get('cajas/requisitos/inactivos', [RequisitoCajaController::class, 'inactivos'])->name('cajas.requisitos.inactivos');


    Route::post('cajas/requisitos/store', [RequisitoCajaController::class, 'store'])->name('cajas.requisitos.store');
    Route::post('cajas/requisitos/{requisitoCaja}/edit', [RequisitoCajaController::class, 'edit'])->name('cajas.requisitos.edit');
    Route::put('cajas/requisitos/update/{requisitoCaja}', [RequisitoCajaController::class, 'update'])->name('requisito-cajas.update');
    /*Route::resource('cajas/requisitos', RequisitoCajaController::class);*/
    Route::put('cajas/requisitos/cambiarEstado/{requisitoCaja}', [RequisitoCajaController::class, 'cambiarEstado'])->name('cajas.requisitos.cambiarEstado');

    Route::resource('cajas/requisitos', RequisitoCajaController::class);
    Route::put('cajas/requisitos/cambiarEstado/{requisitoCaja}', [RequisitoCajaController::class, 'cambiarEstado'])->name('cajas.requisitos.cambiarEstado');


    //Gabinete Medico
    Route::resource('gabinetes-medico', GabinetesMedicoController::class);
    Route::resource('requisitos-gabinetesmedico', RequisitosGabinetesMedicoController::class);

    Route::put('gabinetes-medico/{gabinetesMedico}', [GabinetesMedicoController::class, 'update'])->name('gabinetes-medico.update');
    Route::put('requisitos-gabinetesmedico/{requisitosGabinetesMedico}', [RequisitosGabinetesMedicoController::class, 'update'])->name('requisitos-gabinetesmedico.update');

    
    //NAFS
    Route::resource('nafs', NafController::class);
    Route::resource('requisitos-naf', RequisitosNafController::class);

    //biblioteca
    
    Route::resource('/bibliotecas', bibliotecaController::class);

    Route::get('/bibliotecas/{id}', 'bibliotecaController@show')->name('bibliotecas.show');

    Route::delete('/bibliotecas/{id}', [bibliotecaController::class, 'delete'])->name('bibliotecas.delete');

    Route::get('/bibliotecas/{id}', 'bibliotecaController@buscar')->name('bibliotecas.buscar');

    Route::get('/bibliotecas/estados', [bibliotecaController::class, 'estados'])->name('bibliotecas.estados');

    Route::patch('/bibliotecas/activar/{id}', [bibliotecaController::class, 'activar'])->name('bibliotecas.activar');
    Route::patch('/bibliotecas/desactivar/{id}', [bibliotecaController::class, 'desactivar'])->name('bibliotecas.desactivar');

    Route::get('bibliotecaspdf', [bibliotecaController::class, 'generarReporte'])->name('bibliotecaspdf');
    Route::resource('/productos',productoController::class);
    

    Route::get('/productos/{id}', 'productoController@show')->name('productos.show');


    Route::delete('/productos/{id}', [productoController::class, 'delete'])->name('productos.delete');

    Route::get('/productos/{id}', 'productoController@buscar')->name('productos.buscar');

    Route::get('/productos/estados', [ProductoController::class, 'estados'])->name('productos.estados');


    Route::patch('/productos/activar/{id}', [productoController::class, 'activar'])->name('productos.activar');
    Route::patch('/productos/desactivar/{id}', [productoController::class, 'desactivar'])->name('productos.desactivar');

    Route::get('productospdf', [productoController::class, 'generarReporte'])->name('productospdf');


    Route::resource('/categorias',CategoriaMenuController::class);
    // routes/web.php

    Route::get('categoria_menus/create', [CategoriaMenuController::class, 'create'])->name('categoria_menus.create');

    // Ruta para mostrar la lista de categorías
    Route::get('categoria_menus', [CategoriaMenuController::class, 'index'])->name('categoria_menus.index');

    Route::post('/categoria_menus', 'CategoriaMenuController@store')->name('categoria_menus.store');
    Route::post('/categoria_menus', 'CategoriaMenuController@edit')->name('categoria_menus.edit');
    Route::post('/categoria_menus', 'CategoriaMenuController@create')->name('categoria_menus.create');

    // Ruta para mostrar el formulario de edición
    Route::get('categoria_menus/{id}/edit', [CategoriaMenuController::class, 'edit'])->name('categoria_menus.edit');

    //
    // Ruta para mostrar la lista de categorías
    Route::get('/categoria_menus', [CategoriaMenuController::class, 'index'])->name('categoria_menus.index');

    // Ruta para mostrar el formulario de creación de categoría
    Route::get('/categoria_menus/create', [CategoriaMenuController::class, 'create'])->name('categoria_menus.create');

    // Ruta para almacenar una nueva categoría
    Route::post('/categoria_menus/store', [CategoriaMenuController::class, 'store'])->name('categoria_menus.store');

    // Ruta para mostrar el formulario de edición de categoría
    Route::get('/categorias/{id}/edit', [CategoriaMenuController::class, 'edit'])->name('categoria_menus.edit');

    // Ruta para actualizar una categoría existente
    Route::put('/categorias/{id}', [CategoriaMenuController::class, 'update'])->name('categoria_menus.update');

    // Ruta para eliminar una categoría
    Route::delete('/categorias/{id}', [CategoriaMenuController::class, 'destroy'])->name('categoria_menus.destroy');



});
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




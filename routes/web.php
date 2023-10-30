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

Route::get('/home/naf', [HomeController::class, 'naf'])->name('naf');

Route::get('/home/cafeteria', [HomeController::class, 'cafeteria'])->name('cafeteria');

Route::get('/home/gabinete-medico', [HomeController::class, 'gabinetemedico'])->name('gabinete-medico');

Route::get('/home/plataforma-de-atencion/servicios', [HomeController::class, 'paservicios'])->name('paservicios');

Route::get('/home/plataforma-de-atencion', [HomeController::class, 'plataformadeatencion'])->name('plataforma-de-atencion');

Route::get('/home/cajas', [HomeController::class, 'cajas'])->name('cajas');

Route::post('/home/requisitosCaja', [HomeController::class, 'requisitosCaja'])->name('requisitosCaja');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home/tramites', [HomeController::class, 'tramites'])->name('tramites-inicio');

Route::post('/home/tramitesdisponibles', [HomeController::class, 'tramitesdisponibles'])->name('tramitesdisponibles');

Route::get('/home/tramites/{nombre_categoria}', 'TuControlador@tuMetodo')
    ->where('nombre_categoria', '[A-Za-z0-9\-]+')
    ->name('nombre_categoria');

Route::get('/home/{nombre_area}', 'HomeController@{nombre_area}')->name('nombre_area');

Route::post('/home/requisitos', [HomeController::class, 'requisitos'])->name('requisitos');


Auth::routes();
  
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

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


    Route::resource('cajas', CajaController::class);
    Route::resource('cajasrequisitos', RequisitoCajaController::class);
    Route::resource('nafs', NafController::class);
    Route::resource('gabinetes-medico', GabinetesMedicoController::class);
    Route::resource('requisitos-naf', RequisitosNafController::class);
    Route::resource('requisitos-gabinetesmedico', RequisitosGabinetesMedicoController::class);


});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//menu

Route::resource('/productos',productoController::class);

Route::get('/productos/{id}', 'productoController@show')->name('productos.show');


Route::delete('/productos/{id}', [productoController::class, 'delete'])->name('productos.delete');

Route::get('/productos/{id}', 'productoController@buscar')->name('productos.buscar');

Route::get('/productos/estados', [ProductosController::class, 'estados'])->name('productos.estados');


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


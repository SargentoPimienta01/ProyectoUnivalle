<?php
  
use Illuminate\Support\Facades\Route;
  
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
    return view('welcome');
});

Route::get('/home/naf', [HomeController::class, 'naf'])->name('naf');

Route::get('/home/gabinete-medico', [HomeController::class, 'gabinetemedico'])->name('gabinete-medico');

Route::get('/home/plataforma-de-atencion/servicios', [HomeController::class, 'paservicios'])->name('paservicios');

Route::get('/home/plataforma-de-atencion', [HomeController::class, 'plataformadeatencion'])->name('plataforma-de-atencion');

Route::get('/home/cajas', [HomeController::class, 'cajas'])->name('cajas');

Route::post('/home/requisitosCaja', [HomeController::class, 'requisitosCaja'])->name('requisitosCaja');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home/tramites', [HomeController::class, 'tramites'])->name('tramites');

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
    Route::resource('areas', AreaController::class);
    Route::resource('tramites', TramiteController::class);
    Route::resource('categoria-tramites', CategoriaTramiteController::class);
    Route::resource('requisito-tramites', RequisitoTramiteController::class);
    Route::resource('cajas', CajaController::class);
    Route::resource('cajasrequisitos', RequisitoCajaController::class);
});
<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\InstitucionesController;
use App\Http\Controllers\PeriodosController;
use App\Http\Controllers\InfografiasController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\ReddeserviciosController;
use App\Http\Controllers\NormatividadController;
use App\Http\Controllers\NormatividadarchivosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login',function(){
    return view('usuarios.login');
})->name('login')->middleware('guest');

// Route::get('/panel',function(){
//     return view('panel.home');
// })->middleware('auth')->name('panel');

Route::get('/',[HomeController::class,'index'])->name('inicio');

Route::get('/pagina/noticias/index',[NoticiasController::class,'noticias_index'])->name('pagina.noticias.index');
Route::get('/pagina/noticias/show/{id}',[NoticiasController::class,'show'])->name('pagina.noticias.show');



Route::get('/home',[HomeController::class,'index_panel'])->middleware('auth')->name('home');

//NORMATIVIDAD
Route::get('/panel/normatividad/index',[NormatividadController::class,'index'])->name('panel.normatividad.index');
Route::get('/panel/normatividad/create',[NormatividadController::class,'create'])->name('panel.normatividad.create');
Route::get('/panel/normatividad/edit/{id}',[NormatividadController::class,'edit'])->name('panel.normatividad.edit');
Route::post('/panel/normatividad/store',[NormatividadController::class,'store'])->name('panel.normatividad.store');
Route::post('/panel/normatividad/update',[NormatividadController::class,'update'])->name('panel.normatividad.update');
Route::get('/panel/normatividad/destroy/{id}',[NormatividadController::class,'destroy'])->name('panel.normatividad.destroy');
Route::get('/panel/normatividad/{id}/estado/{valor}',[NormatividadController::class,'estado'])->name('panel.normatividad.estado');

Route::get('/pagina/normatividad/index',[NormatividadController::class,'pagina_index'])->name('pagina.normatividad.index');

//NORMATIVIDAD ARCHIVOS
Route::get('/panel/normatividadarchivos/create/{id}',[NormatividadarchivosController::class,'create'])->name('panel.normatividadarchivos.create');
Route::post('/panel/normatividadarchivos/store',[NormatividadarchivosController::class,'store'])->name('panel.normatividadarchivos.store');
Route::get('/panel/normatividadarchivos/destroy/{id}',[NormatividadarchivosController::class,'destroy'])->name('panel.normatividadarchivos.destroy');



//RED DE SERVICIOS
Route::get('/panel/reddeservicios/index',[ReddeserviciosController::class,'index'])->name('panel.reddeservicios.index');
Route::get('/panel/reddeservicios/create',[ReddeserviciosController::class,'create'])->name('panel.reddeservicios.create');
Route::get('/panel/reddeservicios/edit/{id}',[ReddeserviciosController::class,'edit'])->name('panel.reddeservicios.edit');
Route::post('/panel/reddeservicios/store',[ReddeserviciosController::class,'store'])->name('panel.reddeservicios.store');
Route::post('/panel/reddeservicios/update',[ReddeserviciosController::class,'update'])->name('panel.reddeservicios.update');
Route::get('/panel/reddeservicios/{id}/estado/{valor}',[ReddeserviciosController::class,'estado'])->name('panel.reddeservicios.estado');

Route::get('/pagina/reddeservicios/index',[ReddeserviciosController::class,'pagina_index'])->name('pagina.reddeservicios.index');

//NOTICIAS
Route::get('/panel/noticias/index',[NoticiasController::class,'index'])->name('panel.noticias.index');
Route::get('/panel/noticias/create',[NoticiasController::class,'create'])->name('panel.noticias.create');
Route::post('/panel/noticias/store',[NoticiasController::class,'store'])->name('panel.noticias.store');
Route::get('/panel/noticias/edit/{id}',[NoticiasController::class,'edit'])->name('panel.noticias.edit');
Route::post('/panel/noticias/update',[NoticiasController::class,'update'])->name('panel.noticias.update');

//NOTICIAS ESTADOS
Route::get('/panel/noticias/{id}/slider/{valor}',[NoticiasController::class,'slider'])->name('panel.noticias.slider');
Route::get('/panel/noticias/{id}/portada/{valor}',[NoticiasController::class,'portada'])->name('panel.noticias.portada');
Route::get('/panel/noticias/{id}/estado/{valor}',[NoticiasController::class,'estado'])->name('panel.noticias.estado');


//INSTITUCIONES
Route::get('/panel/instituciones/index',[InstitucionesController::class,'index'])->name('panel.instituciones.index');
Route::get('/panel/instituciones/create',[InstitucionesController::class,'create'])->name('panel.instituciones.create');
Route::get('/panel/instituciones/edit/{id}',[InstitucionesController::class,'edit'])->name('panel.instituciones.edit');
Route::post('/panel/instituciones/store',[InstitucionesController::class,'store'])->name('panel.instituciones.store');
Route::post('/panel/instituciones/update',[InstitucionesController::class,'update'])->name('panel.instituciones.update');

//PERIODOS
Route::get('/panel/periodos/index',[PeriodosController::class,'index'])->name('panel.periodos.index');
Route::get('/panel/periodos/create',[PeriodosController::class,'create'])->name('panel.periodos.create');
Route::get('/panel/periodos/edit/{id}',[PeriodosController::class,'edit'])->name('panel.periodos.edit');
Route::post('/panel/periodos/store',[PeriodosController::class,'store'])->name('panel.periodos.store');
Route::post('/panel/periodos/update',[PeriodosController::class,'update'])->name('panel.periodos.update');

//INFOGRAFÍAS
Route::get('/panel/infografias/create',[InfografiasController::class,'create'])->name('panel.infografias.create');
Route::post('/panel/infografias/store',[InfografiasController::class,'store'])->name('panel.infografias.store');
Route::get('/panel/infografias/index',[InfografiasController::class,'index'])->name('panel.infografias.index');
Route::get('/panel/infografias/edit/{id}',[InfografiasController::class,'edit'])->name('panel.infografias.edit');
Route::post('/panel/infografias/update',[InfografiasController::class,'update'])->name('panel.infografias.update');
Route::get('/panel/infografias/{id}/estado/{valor}',[InfografiasController::class,'estado'])->name('panel.infografias.estado');

Route::get('/pagina/infografias/index',[InfografiasController::class,'index_pagina'])->name('pagina.infografias.index');


//ESTADISTICAS-PAGINA
Route::get('/pagina/estadisticas/index',[EstadisticasController::class,'index_pagina'])->name('pagina.estadisticas.index');
Route::get('/pagina/estadisticas/show/{id}',[EstadisticasController::class,'show'])->name('pagina.estadisticas.show');

//ESTADISTICAS
Route::get('/panel/estadistica/create/{id}',[EstadisticasController::class,'create'])->name('panel.estadistica.create');
Route::post('/panel/estadistica/store',[EstadisticasController::class,'store'])->name('panel.estadistica.store');
Route::get('/panel/estadistica/edit/{id}',[EstadisticasController::class,'edit'])->name('panel.estadistica.edit');
Route::post('/panel/estadistica/update',[EstadisticasController::class,'update'])->name('panel.estadistica.update');
Route::get('/panel/estadistica/destroy/{id}',[EstadisticasController::class,'destroy'])->name('panel.estadistica.destroy');
//USUARIOS
Route::get('/usuarios/index', [UserController::class,'index'])->middleware(['auth'])->name('usuarios.index');
Route::get('/usuarios/edit/{id}', [UserController::class,'edit'])->middleware(['auth'])->name('usuarios.edit');
Route::post('/usuarios/update', [UserController::class,'update'])->middleware(['auth'])->name('usuarios.update');
Route::get('/usuarios/create', [UserController::class,'create'])->middleware(['auth'])->name('usuarios.create');
Route::post('/usuarios/store', [UserController::class,'store'])->middleware(['auth'])->name('usuarios.store');

Route::get("/verificanombre/{name}",[UserController::class,'verificanombre'])->middleware(['auth'])->name('verificanombre');
Route::get("/verificaemail/{email}",[UserController::class,'verificaemail'])->middleware(['auth'])->name('verificaemail');
Route::post("/ActualizaContrasena",[UserController::class, "ActualizaContrasena"])->middleware(['auth'])->name('Actualiza.Contrasena');

Route::post("/login",[LoginController::class, 'login']);
Route::put('/login', [LoginController::class, 'logout']);


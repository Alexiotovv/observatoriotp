<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\InstitucionesController;
use App\Http\Controllers\PeriodosController;
use App\Http\Controllers\InfografiasController;
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


Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/pagina/noticias/index',[NoticiasController::class,'noticias_index'])->name('pagina.noticias.index');
Route::get('/pagina/noticias/show/{id}',[NoticiasController::class,'show'])->name('pagina.noticias.show');



Route::get('/paneladmin',[HomeController::class,'index_panel'])->name('paneladmin');

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
Route::get('/panel/infografias/{id}/estado/{valor}',[InfografiasController::class,'estado'])->name('panel.noticias.infografias');

//CONFIGURACIONES


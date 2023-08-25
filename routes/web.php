<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\DatosController;
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
Route::get('/panel/noticias/index',[NoticiasController::class,'index'])->name('panel.noticias.index');
Route::get('/panel/noticias/create',[NoticiasController::class,'create'])->name('panel.noticias.create');
Route::post('/panel/noticias/store',[NoticiasController::class,'store'])->name('panel.noticias.store');
Route::get('/panel/noticias/edit/{id}',[NoticiasController::class,'edit'])->name('panel.noticias.edit');
Route::post('/panel/noticias/update',[NoticiasController::class,'update'])->name('panel.noticias.update');

Route::get('/panel/datos/index',[DatosController::class,'index'])->name('panel.datos.index');
Route::get('/panel/datos/create',[DatosController::class,'create'])->name('panel.datos.create');
Route::post('/panel/datos/store',[DatosController::class,'store'])->name('panel.datos.store');
Route::get('/panel/datos/edit/{id}',[DatosController::class,'edit'])->name('panel.datos.edit');
Route::post('/panel/datos/update',[DatosController::class,'update'])->name('panel.datos.update');

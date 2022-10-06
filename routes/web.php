<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\AprendizCursoController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\EquipoController;

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
    return view('app');
});

Route::get('/curso',[CursosController::class,'index'])->name('curso');
Route::post('/curso',[CursosController::class, 'store'])->name('curso');
Route::get('/curso/{id}',[CursosController::class, 'edit'])->name('curso-edit');
Route::patch('/curso/{id}', [CursosController::class, 'update'])->name('curso-update');
Route::delete('/curso/{id}',[CursosController::class, 'destroy'])->name('curso-destroy');

Route::resource('aprendiz', AprendizController::class);
Route::resource('aprendizcurso', AprendizCursoController::class);
Route::resource('ubicacion', UbicacionController::class);
Route::resource('equipo', EquipoController::class);





<?php

use Illuminate\Support\Facades\Route;

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
Route::get('login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('singin', [App\Http\Controllers\LoginController::class, 'datos_estudiante'])->name('datos_estudiante');
Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


Route::group(['middleware', 'auth:sanctum', 'verified'], function(){
    Route::get('/dashboard', [App\Http\Controllers\PageController::class, 'Home'])->name('inicio');
    Route::get('/home', [App\Http\Controllers\PageController::class, 'layout'])->name('inicio');
    Route::get('/biologia', [App\Http\Controllers\PageController::class, 'biologia'])->name('biologia');
    Route::get('/quimica', [App\Http\Controllers\PageController::class, 'quimica'])->name('quimica');
    Route::get('/fisica', [App\Http\Controllers\PageController::class, 'fisica'])->name('fisica');
    Route::get('/sociales', [App\Http\Controllers\PageController::class, 'sociales'])->name('sociales');
    Route::get('/matematicas', [App\Http\Controllers\PageController::class, 'matematicas'])->name('matematicas');
    Route::get('/ingles', [App\Http\Controllers\PageController::class, 'ingles'])->name('ingles');
    Route::get('/lectura', [App\Http\Controllers\PageController::class, 'lectura'])->name('lectura');
    Route::get('/piloto', [App\Http\Controllers\PageController::class, 'piloto'])->name('piloto');
    Route::get('/vacacional', [App\Http\Controllers\PageController::class, 'vacacional'])->name('vacacional');
    /** RUTAS DE ADIGNATURAS Y CURSO */
    Route::get('/asignaturas', [App\Http\Controllers\PageController::class, 'asignaturas'])->name('asignaturas');
    Route::get('/cursos', [App\Http\Controllers\PageController::class, 'cursos'])->name('cursos');
    /** RUTAS DE SERVICIOS */
    Route::get('/registrofimat', [App\Http\Controllers\RegistroUsuarioController::class, 'RegistrarUsuario'])->name('RegistrarUsuario');
    Route::post('guardar/registro', [App\Http\Controllers\RegistroUsuarioController::class, 'GuardarRegistro'])->name('GuardarRegistro');
    Route::post('guardar/curso', [App\Http\Controllers\RegistroUsuarioController::class, 'Guardado_cursos'])->name('Guardado_cursos');
    Route::post('guardar/asigantura', [App\Http\Controllers\RegistroUsuarioController::class, 'Guardar_asignaturas'])->name('Guardar_asignaturas');
    Route::post('agregar/material', [App\Http\Controllers\MaterialController::class, 'AgregarMaterial'])->name('AgregarMaterial');
    /** RUTAS DE CONSULTAS */
    Route::get('/consultar/asignaturas', [App\Http\Controllers\ConsultasController::class, 'cursos'])->name('cursos');
    Route::get('/consultar/cursos', [App\Http\Controllers\ConsultasController::class, 'consultar_curso'])->name('consultar_curso');
    Route::get('/consultar/material', [App\Http\Controllers\MaterialController::class, 'ConsultarMaterial'])->name('ConsultarMaterial');
    /** consultar estudiante */
    //Route::get('/consultar/estudiante', [App\Http\Controllers\MaterialController::class, 'ConsultarEstudiante'])->name('ConsultarMaterial');
    Route::get('/consultar/estudianteperfil', [App\Http\Controllers\MaterialController::class, 'ConsultarEstudiante'])->name('ConsultarEstudiante');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\Persona_AsignaturaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RolController;

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

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuario', 'index');
    Route::post('/crearusuario', 'crearUsuario');
    Route::put('/modificarusuario/{id}', 'modificarUsuario');
    Route::delete('/eliminarusuario/{id}', 'EliminarUsuario');
});

Route::controller(PersonaController::class)->group(function () {
    Route::get('/persona', 'index');
    Route::post('/crearpersona', 'crearPersona');
    Route::put('/modificarpersona/{id}', 'ModificarPersona');
});

Route::controller(RolController::class)->group(function () {
    Route::get('/rol', 'index');
    Route::post('/crearrol', 'crearRol');
});

Route::controller(AsignaturaController::class)->group(function () {
    Route::get('/asignatura', 'index');
    Route::post('/crearasignatura', 'crearAsignatura');
    Route::put('/modificarasignatura/{id}', 'ModificarAsignatura');
    Route::delete('/eliminarasignatura/{id}', 'EliminarAsignatura');
});

Route::controller(CursoController::class)->group(function () {
    Route::get('/curso', 'index');
    Route::post('/crearcurso', 'crearCurso');
    Route::delete('/eliminarcurso/{id}', 'EliminarCurso');
});

Route::controller(Persona_AsignaturaController::class)->group(function () {
    Route::get('/persona_asignatura', 'index');
    Route::post('/crearpersona_asignatura', 'CrearPersona_Asignatura');
});
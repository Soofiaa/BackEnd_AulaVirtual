<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

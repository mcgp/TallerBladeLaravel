<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisesController;


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

Route::get('/', function () {
    return view('welcome');
});

// Creamos la ruta para acceder a la vista
// Esta ruta redireccionará a la vista paises del controlador PaisesController.
Route::get('/paises', 'App\Http\Controllers\PaisesController@index');


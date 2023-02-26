<?php

use Illuminate\Queue\RedisQueue;
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

Route::get('/', function () {
    return view('welcome');
});
//ejemplo1 regresa texto
Route::get('/texto', function () {
    return  '<h1>esto es un texto priueba</h1>';
});

//ejemplo2  con array
Route::get('/arreglo', function () {
    $arreglo = [
            'id' => '1',
            'Descripcion' => 'Producto 1'
    ];
    return $arreglo;
});

//ejemplo 3 parametros
Route::get('/nombre/{nombre}', function ($nombre) {
    return '<h1>El ombre es '.$nombre. '</h1>';
});

//ejemplo 4 parametros con default
Route::get('/cliente/{cliente?}', function ($cliente='cliente general') {
    return '<h1>El cliente es '.$cliente. '</h1>';
});

//ejemplo5
Route::get('/ruta1', function () {
    return  '<h1>esto es un la vista de la ruta 1s</h1>';
})->name('rutaNro1');

Route::get('/ruta2', function () {
    // return  '<h1>esto es un la vista de la ruta 2</h1>';
    return redirect()->route('rutaNro1');
});

//ejemplo6
Route::get('/usuario/{usuario}', function ($usuario) {
    return 'El usuario es:'.$usuario;
})->where('usuario','[0-9]+');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

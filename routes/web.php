<?php

use Illuminate\Contracts\View\View;
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
/*
Route::get('/', function () {
    return view('welcome');
});*/
    if (view()->exists('view.vista2')){
    Route::get('/',function(){
        return view('vista1',['nombre'=>'juan']);
    });
    }else{
    Route::get('/',function(){
        return 'la vista solicitada no esxite';
    });
    }

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

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
    return view('auth.login');
});
Route::post('logar','UtilizadorController@logar');
Route::post('loginAPI','UtilizadorController@loginAPI');

Route::middleware(['auth'])->group(function () {
    Route::get('home',function(){
        return view('layouts.home');
    });
    Route::get('logout','UtilizadorController@logout');
    Route::get('myPerfil',function(){
        return view('auth.perfil');
    });

    Route::get('consultarCliente',function(){
        return view('clientes.consultar');
    });
    Route::post('pesquisarCliente','ClienteController@pesquisarCliente');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

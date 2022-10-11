<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
//Route::post('logar','UtilizadorController@logar');
Route::post('logar','UtilizadorController@loginAPI');

Route::middleware(['access'])->group(function () {
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

    Route::get('isCarregadoClientes','ClienteController@isCarregadoClientes');
    Route::get('isCarregadoCabecalho','CabecalhoController@isCarregadoCabecalho');


    //Rotas Upload files
    Route::get('uploadClientes',function(){
        return view('upload.uploadfile');
    });
    Route::post('carregarFicheiro','UploadController@carregarFicheiro');
    Route::post('carregarFicheiroCabeca','UploadController@carregarFicheiroCabeca');

    //Rotas do Relatorio
    Route::get('verRelatorio/{pecodigo}','RelatorioController@criarRelatorio');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('xxx/{tipo}/{num_documento}','APIController@pegaCreditosAPI')->where('num_documento', '(.*)');

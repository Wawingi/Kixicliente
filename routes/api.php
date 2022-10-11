<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registarClientesAPI','ClienteController@registarClientesAPI');
Route::get('pegaCreditos/{tipo}/{num_documento}','APIController@pegaCreditosAPI')->where('num_documento', '(.*)');
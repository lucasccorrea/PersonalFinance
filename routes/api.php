<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteFileRegistrar;

Route::get('me', 'AuthController@me');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');

Route::group(['namespace' => 'Api', 'middleware' => 'auth:api'], function() {
    Route::delete('clientes/{cliente}','ClienteController@destroy');
    Route::get('clientes','ClienteController@index');
    Route::get('clientes/{cliente}','ClienteController@show');
    Route::get('clientes/{cliente}/telefone','ClienteController@telefone');
    Route::post('clientes','ClienteController@store');
    Route::put('clientes/{cliente}','ClienteController@update');
    
    Route::delete('telefones/{cliente}','TelefoneController@destroy');
    Route::get('telefones','TelefoneController@index');
    Route::post('telefones','TelefoneController@store');
    Route::put('telefones/{cliente}','TelefoneController@update');
    
    Route::delete('titulos/{titulo}','TituloController@destroy');
    Route::get('titulos','TituloController@index');
    Route::get('titulos/{titulo}','TituloController@show');
    Route::get('titulos/{titulo}/cliente','TituloController@cliente');
    Route::post('titulos','TituloController@store');
    Route::put('titulos/{titulo}','TituloController@update');
});
<?php
use Illuminate\Support\Facades\Route;
Route::get('me', 'AuthController@me');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');


Route::delete('clientes/{cliente}','Api\ClienteController@destroy');
Route::get('clientes','Api\ClienteController@index');
Route::get('clientes/{cliente}','Api\ClienteController@show');
Route::get('clientes/{cliente}/telefone','Api\ClienteController@telefone');
Route::post('clientes','Api\ClienteController@store');
Route::put('clientes/{cliente}','Api\ClienteController@update');

Route::delete('telefones/{cliente}','Api\TelefoneController@destroy');
Route::get('telefones','Api\TelefoneController@index');
Route::post('telefones','Api\TelefoneController@store');
Route::put('telefones/{cliente}','Api\TelefoneController@update');

Route::delete('titulos/{titulo}','Api\TituloController@destroy');
Route::get('titulos','Api\TituloController@index');
Route::get('titulos/{titulo}','Api\TituloController@show');
Route::get('titulos/{titulo}/cliente','Api\TituloController@cliente');
Route::post('titulos','Api\TituloController@store');
Route::put('titulos/{titulo}','Api\TituloController@update');
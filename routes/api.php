<?php
use Illuminate\Support\Facades\Route;
Route::delete('clientes/{cliente}','Api\ClienteController@destroy');
Route::get('clientes','Api\ClienteController@index');
Route::get('clientes/{cliente}','Api\ClienteController@show');
Route::post('clientes','Api\ClienteController@store');
Route::put('clientes/{cliente}','Api\ClienteController@update');
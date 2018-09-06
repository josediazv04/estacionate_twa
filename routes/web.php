<?php

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

/*Route::get('/', ['as' => 'home', 'uses' => 'mapController@index'], function () {
    return view('welcome');
});*/

Route::get('/mapa', ['as' => 'home', 'uses' => 'MapController@index']);

//Route::get('/estacionamientos', ['as' => 'home', 'uses' => 'EstacionamientoController@index']);

Route::get('/locales', ['as' => 'home', 'uses' => 'LocalController@index']);

Route::get('/', ['as' => 'home', 'uses' => 'InicioController@index']);



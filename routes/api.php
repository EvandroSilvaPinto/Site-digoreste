<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('paises', "Api\CountriesController@index");
Route::get('pais/{countrie_id}/estados', "Api\StatesController@index");
Route::get('pais/{countrie_id}/estado/{state_id}/cidades', "Api\CitiesController@index");
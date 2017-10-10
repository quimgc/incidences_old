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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

//sempre hi haura dos retrieve -> llita completa -> o amb paginació (de 10 en 10, anant avançant pàgina..)
Route::get('/incidences','IncidenceController@index');

//El segon retrieve és per ensneyar 1 recurs concret
//ha de ser igual el nom {incidence} que amb el IncidenceController que se li passa per paràmetre
Route::get('/incidences/{incidence}','IncidenceController@show');

Route::get('/incidences_alt/{id}','IncidenceController@show2');

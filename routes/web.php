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
    return view('pages.index');
});

Route::group(['prefix' => 'customers'], function () {
    Route::get('/', ['as' => 'customers.index', 'uses' => 'CustomerController@getIndex']);
    Route::match(
        ['get', 'post'],
        '/create',
        ['as' => 'customers.create', 'uses' => 'CustomerController@create']
    );
    Route::delete('/delete', ['as' => 'customers.delete', 'uses' => 'CustomerController@delete']);

    Route::get('/view/{id}', ['as' => 'view', 'uses' => 'CustomerController@view']);

    Route::get('/pets/{id}', ['as' => 'customers.pets', 'uses' => 'CustomerController@getPets']);
});

Route::group(['prefix' => 'pets'], function () {

});

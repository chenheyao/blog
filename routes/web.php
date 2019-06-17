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

Route::any('/', function () {
    return view('welcome');
});

Route::prefix('/user')->group(function(){
    Route::get('add','UserController@add')->middleware('login');
    Route::any('addHandel','UserController@addHandel');
    Route::any('list','UserController@list');
    Route::any('del/{id}','UserController@del');
    Route::any('edit/{id}','UserController@edit');
    Route::any('update/{id}','UserController@update');
    Route::any('loginAdd','UserController@loginAdd');
    Route::any('loginHandel','UserController@loginHandel');
    Route::any('loginSave','UserController@loginSave');
    Route::any('saveAdd','UserController@saveAdd');
});

Route::prefix('/admin')->group(function(){
    Route::get('add','adminController@add');
    Route::any('addHandel','adminController@addHandel');
    Route::any('index','adminController@index');
    Route::any('del/{id}','adminController@del');
    Route::any('edit/{id}','adminController@edit');
    Route::any('editHandel/{id}','adminController@editHandel');
});

Route::prefix('/index')->group(function(){
    Route::get('add','indexController@add');
    Route::any('addHandel','indexController@addHandel');
    Route::any('list','indexController@list');
    Route::any('del/{id}','indexController@del');
    Route::any('edit/{id}','indexController@edit')->middleware('index');
    Route::any('editHandel/{id}','indexController@editHandel');
});
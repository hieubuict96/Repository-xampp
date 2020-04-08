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

Route::get('test', function(){
    return view('testform');
});

Route::post('test', "TestController@update");
Route::get('update', function(){
    return view('testform');
});

Route::get('unit7api', function(){
    return view('unit7API');
});
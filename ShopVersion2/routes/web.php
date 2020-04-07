<?php

use Illuminate\Support\Facades\Route;


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

Route::get('index', [
    'as' => 'index',
    'uses' => 'PageController@index'
]);

Route::get('product/{id}',[
    'as' => 'sanpham',
    'uses' => 'PageController@sanpham'
]);

Route::get('signin',  function(){
    return view('view.signin');
})->name('dangnhap');

Route::get('signup',  function(){
    return view('view.signup');
})->name('dangky');

Route::post('psignup',[
    'as' => 'pdangky',
    'uses' => 'PageController@psignup'
]);

Route::post('psignin',[
    'as' => 'psignin',
    'uses' => 'PageController@psignin'
]);

Route::get('dangxuat',[
    'as' => 'dangxuat',
    'uses' => 'PageController@dangxuat'
]);

Route::get('themsanpham/{id}',[
    'as' => 'themsanpham',
    'uses' => 'PageController@themsanpham'
]);

Route::get('xoasanpham/{id}', [
    'as' => 'xoasanpham',
    'uses' => 'PageController@xoasanpham'
]);

Route::get('dathang', function(){
    $cart = Session::get('cart');
    return view('view.dathang', ['cart'=>$cart]);
})->name('dathang');

Route::post('pdathang', [
    'as'=>'pdathang',
    'uses'=>'PageController@dathang'
]);

Route::get('search', 'PageController@search')->name('search');
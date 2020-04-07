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

Route::get('index', 
	[	'as' => 'trang-chu',
		'uses' => 'PageController@getIndex'
	]);

Route::get('loai-san-pham/{type}', [
	'as' => 'loaisanpham',
	'uses' => 'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}', [
	'as' => 'chitietsanpham',
	'uses' => 'PageController@getChitiet'
]);

Route::get('lien-he', [
	'as' => 'lienhe',
	'uses' => 'PageController@getLienHe'
]);

Route::get('gioi-thieu', [
	'as' => 'gioithieu',
	'uses' => 'PageController@getGioiThieu'
]);

Route::get('a', 'HController@abc');

Route::get('add-to-cart/{id}',[
	'as' => 'themgiohang',
	'uses' => 'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}', [
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);

Route::get('dat-hang1', [
	'as'=>'dathang1',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang2', [
	'as'=>'dathang2',
	'uses'=>'PageController@postCheckout'
]);

Route::get('login', [
	'as' => 'dangnhap',
	'uses' => 'PageController@login'
]);

Route::get('signup', [
	'as' => 'dangky', 
	'uses' => 'PageController@signup'
]);

Route::post('signup1', [
	'as' => 'dangky1', 
	'uses' => 'PageController@signup1'
]);

Route::post('login', [
	'as' => 'dangnhap',
	'uses' => 'PageController@postlogin'
]);

Route::get('logout', [
	'as'=>'dangxuat',
	'uses'=>'PageController@getlogout'
]);

Route::get('search', [
	'as'=>'search',
	'uses'=>'PageController@getsearch'
]);
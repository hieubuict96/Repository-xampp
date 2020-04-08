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

use App\TheLoai;

Route::get('thud', function(){
	$theloai = TheLoai::find(1);
	foreach ($theloai -> loaitin as $loaitin) {
		# code...
		echo $loaitin -> Ten. '<br>';
	}
});


Route::get('thu', function()
{
	return view('admin.theloai.danhsach');
});

Route::group(['prefix' => 'admin'], function(){
	Route::group(['prefix' => 'theloai'], function(){
		Route::get('danhsach', 'TheLoaiController@getDanhSach');

		Route::get('them', 'TheLoaiController@getThem');
		Route::post('them', 'TheLoaiController@postThem');

		Route::get('sua/{id}', 'TheLoaiController@getSua');
		Route::post('sua/{id}', 'TheLoaiController@postSua');

		Route::get('xoa/{id}','TheLoaiController@getXoa');
	});

	Route::group(['prefix' => 'loaitin'], function()
	{
		Route::get('danhsach', 'loaitinController@getDanhSach');

		Route::get('them', 'loaitinController@getThem');
		Route::post('them', 'loaitinController@postThem');

		Route::get('sua/{id}', 'loaitinController@getSua');
		Route::post('sua/{id}', 'loaitinController@postSua');

		Route::get('xoa/{id}','loaitinController@getXoa');
	});
});

Route::get('f', function()
{
	return view('admin.layout.index');
});

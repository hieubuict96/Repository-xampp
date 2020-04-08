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

Route::get('array',['name'=>'get.array','uses'=>'HomeController@showWelcome']);

Route::get('dienten/{ten}', function($ten){
	return "tên tôi là: ". $ten;
});

Route::get('Laravel/{ngay}',function($ngay){
	echo "ngày là: " . $ngay;
}) -> where (['ngay'=> '[0-9]{1,2}']);

Route::get('Laravel/{ngay}/{thang}',function($ngay,$thang){
	echo "ngày là: " . $ngay . "/" . $thang;
}) -> where (['ngay'=> '[0-9]{1,2}','thang' => '[0-9]{1,2}']);

Route::group(['prefix'=>'mygroup'], function(){
	Route::get('user1',function(){
		echo "1";
	});
	Route::get('user2',function(){
		echo "2";
	});
});
//database
Route::get('database',function(){
	Schema::create('loaisanpham',function($table){
		$table->increments('id');
		$table->string('ten',200);
	});
	echo "đã thực hiện chuyển đổi";
});

Route::get('database', function(){
	Schema::create('SanPham',function($table){
		$table -> increments('id');
		$table -> string('ten'); 
		$table -> integer('soluong');
});
echo "đã thực hiện xong";
});


Route::get('qb',function(){
	$data = DB::table('users') -> select(['id', 'name', 'email']) -> where('id',2) -> get();
		foreach ($data as $value)
		 {
		 	foreach ($value as $key => $value1) {
		 		echo $key.': '.$value1.'<br>';# code...
		 	}
		 	echo '<hr>';
		}
});

Route::get('model', function(){
	$abc = new App\User();
	$abc -> name = "hieubui";
	$abc -> email = "hieubuictth96@gmail.com";
	$abc -> password = "asdf";
	$abc -> save();
	echo 'đã thực hiện xong';
});

Route::get('model/query',function(){
	$abc = App\User:: find(3);
	echo $abc ->name;
}); 

Route::get('model/save/{ten}',function($ten){
	$sanpham = new App\SanPham();
	$sanpham -> ten = "$ten";
	$sanpham -> soluong = 100;
	$sanpham -> save();
	echo 'đã thực hiện save()';
});

Route::get('model/all',function(){
	$sanpham = App\SanPham::all();
	echo "$sanpham";
});

Route::get('diem',function(){
	echo "ban da đủ diem";
})-> middleware ('MyMiddle') -> name('diem');

Route::get('loi', function(){
	echo "ban chua đủ diem";
}) -> name('loi');

Route::get('nhapdiem',function(){
	return view('nhapdiem');
}) -> name('nhapdiem');

Route::get('dangnhap',function(){
	return view('dangnhap');
});

Route::post('login','AuthController@login')->name('login');

Route::group(['namespace'=>'app\Http\Controllers'],function(){
    //nếu không sử dụng option namespace thì bạn phải viết
    //Route::get('/post','Indexs\PostController@showPost');
    Route::get('/post','HomeController@showPost');
});

Route::group(['middleware' => ['web']], function(){
	Route::get('session',function(){
		Session::put('KhoaPham', 'Laravel');	
		/*echo "đã đặt session";
		echo "<br>";
		echo Session::get('KhoaPham');
		echo '<br>';
		if (Session::has('KhoaPham')) {
			echo 'đã tồn tại';
		}*/
	});
});

Route::get('test',function(){
	echo Session::get('KhoaPham');
});

Route::get('dulieu',function(){
	Schema::create('taobang',function($table){
		$table -> increments('STT');
		$table -> string('họ và tên');
		$table -> integer('số điện thoại');
	});
	echo 'đã thực hiện tạo bảng';
});

Route::get('email', 'PhanTrangController@index');

Route::get('viewss', 'ViewController@getReturn');

Route::get('/data', function()
{
    return View::make('passdata',['email'=>'thinhbuzz@freetuts.net','username'=>'MrBuzz'],['nickname'=>'Buzz']);
});

Route::get('loaidongvat', 'HomeController@gioithieu');

Route::get('ad/{cube}', function($cube)
{
	return view('viewss', ['cube' => $cube]);
});

Route::get('sua/{id}', function($id)
{
	return view('return', ['id' => $id]);
});

Route::get('mode',function(){
	$sanpham = new App\SanPham();
	$sanpham -> ten = "Bùi Đình Hiếu";
	$sanpham -> soluong = 100;
	$sanpham -> save();
	echo 'đã thực hiện save()';
});

Route::get('themvao', 'HomeController@thembien');
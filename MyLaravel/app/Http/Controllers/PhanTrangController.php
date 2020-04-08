<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tenmodel;

class PhanTrangController extends Controller
{
	public function index() {
		$sanpham = tenmodel::where('email','=','đây là mục 5') -> Paginate(3);
		return view('PhanTrang', ['sanpham' => $sanpham]);
  	}
}


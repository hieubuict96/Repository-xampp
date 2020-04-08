<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\tenmodel;

class HomeController extends Controller
{
	public function thembien(Request $request)
	{
	$them = new App\tenmodel();
	$them -> STT = $request -> STT;
	$them -> save();
	echo 'đã xong';
	}
}
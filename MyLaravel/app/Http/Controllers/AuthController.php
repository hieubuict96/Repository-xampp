<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $Request){
    	$username = $Request['username'];
    	$password = $Request['password'];
    	if (Auth::attempt(['name' => $username, 'password' => $password])) {
    		return view('thanhcong');
    	}else{
    		return view('dangnhap');
    	}
    }

}

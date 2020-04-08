<?php

namespace App\Http\Controllers;
use App\TestModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function register(Request $req){
        $new = new TestModel;
        $new->id = $req->id;
        $new->Ten = $req->Ten;
        $new->TenKhongDau = $req->TenKhongDau;
        echo $new->save();
    }

    public function update(Request $req){
        $update = TestModel::find($req->TenKhongDau);
        $update->TenKhongDau = $req->Ten;
        echo $update->save();
    }
}

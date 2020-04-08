<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductModel;

class ProductsController extends Controller
{
    //
    public function save(Request $req){
        $product = new ProductModel;
        $product->id = $req->id;
        $product->Ten = $req->Ten;
        $product->TenKhongDau = $req->TenKhongDau;
        if($product->save()){
            return ['result'=>'Product has been Saved'];
        }
    }

    function update(Request $req){
        $product = ProductModel::find($req->id);
        $product->TenKhongDau = $req->TenKhongDau;
        if($product->save()){
            return ['result'=>'success', 'msg'=>'data is updated'];
        }
    }
}

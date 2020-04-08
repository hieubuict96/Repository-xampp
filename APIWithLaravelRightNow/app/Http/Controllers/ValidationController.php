<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ValidationModel;
use Validator;
class ValidationController extends Controller
{
    //
    public function save(Request $req){
        $validate = Validator::make($req->all(),[
            'Ten'=>'required',
            'hoten'=>'same:Ten'
        ]);

        if($validate->fails()){
            return response()->json([
                'error'=>'sai'
            ]);
        }else{
            return response()->json([
                'success'=>'dung'
            ]);
        }
    }
}
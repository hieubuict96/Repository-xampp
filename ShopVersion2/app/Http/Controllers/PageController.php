<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Products;
use App\Users;
use Auth;
use Session;
use App\Cart;
use App\Customer;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index(){
        $slide = Slide::all();
        $product_new = Products::where('new', 1)->paginate(4);
        $product_promo = Products::where('promotion_price', '!=', 0)->paginate(6);
        return view('view.trangchu', compact('slide', 'product_new', 'product_promo',));
    }

    public function sanpham($id){
        $sanpham = Products::find($id);
        return view('view.sanpham', ['sanpham' => $sanpham]);
    }

    public function psignup(Request $req){
        $signup = new Users;  
        $req->validate([
            'email'=>'required|unique:Users,email',
            'ten'=>'required',
            'diachi'=>'required',
            'phone'=>'required|unique:Users,phone',
            'password'=>'required|min:6',
            'repassword'=>'required|same:password'
        ],[
            'email.required'=>'Bạn chưa nhập địa chỉ email',
            'email.unique'=>'Địa chỉ email đã được đăng ký',
            'ten.required'=>'Bạn chưa nhập Họ tên',
            'diachi.required'=>'Bạn chưa nhập địa chỉ',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
            'phone.unique'=>'Số điện thoại đã được sử dụng',
            'password.required'=>'Bạn chưa nhập Mật khẩu',
            'password.min'=>'Mật khẩu phải tối thiểu 6 kí tự',
            'repassword.required'=>'Bạn chưa nhập xác nhận Mật khẩu',
            'repassword.same'=>'Xác nhận mật khẩu và mật khẩu không trùng khớp'
        ]);
        $signup->email = $req->email;
        $signup->full_name = $req->ten;
        $signup->address = $req->diachi;
        $signup->phone = $req->phone;
        $signup->password = bcrypt($req->password);
        $signup->save();
        return redirect()->back()->with('success', 'Đăng ký thành công');
    }

    public function psignin(Request $req){
        if(Auth::attempt(['email'=>$req->email, 'password'=>$req->password])){
            return redirect()->route('index');
        }else{
            return redirect()->back()->with('thongbao','Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }

    public function dangxuat(){
        Auth::logout();
        return redirect()->back();
    }

    public function themsanpham($id){
        $spmoi = Products::find($id);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $newCart = new Cart($oldCart);
        $newCart->add($spmoi, $id);
        Session::put('cart', $newCart);
        return redirect()->back();
    }

    public function xoasanpham($id){
        $oldCart = Session::get('cart');
        $newCart = new Cart($oldCart);
        $newCart->reduceByOne($id);
        if ($newCart->items) {
            Session::put('cart', $newCart);
        }else{
            session()->flush();
        }
        return redirect()->back();
    }

    public function dathang(Request $req){
        $customer = new Customer;
        $customer->name = $req->ten;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->diachi;
        $customer->phone_number = $req->phone;
        $customer->note = $req->ghichu;
        $customer->save();
        return redirect()->back()->with('thanhcong', 'Đặt hàng thành công');
    }

    public function search(Request $req){
        $product = Products::where('name', 'like', '%'. $req->search .'%')->orWhere('unit_price', $req->search)->get();
        return view('view.ketquatimkiem', ['product'=>$product, 'ten'=>$req->search]);
    }
}

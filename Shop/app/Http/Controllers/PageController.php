<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Auth;

class PageController extends Controller
{
    //
    public function getIndex()
    {
    	$slide = Slide::all();
     	$new_product = Product::where('new', 1)->paginate(4);
    	$sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8);
    	return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }
    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type', $type) ->paginate(3);
        $sp_khac = Product::where('id_type', '<>', $type) -> paginate(3);
        $loai = ProductType::all();
        $loaisp = ProductType::where('id', $type)-> first();
    	return view('page.loai_sanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loaisp'));
    }
    public function getChitiet(Request $Request)
    {
        $sanpham = Product::where('id', $Request->id) -> first();
        $sp_tuongtu = Product::where('id_type', $sanpham -> id_type)->paginate(3);
    	return view('page.chitiet_sanpham' , compact('sanpham', 'sp_tuongtu'));
    }
    public function getLienHe()
    {
    	return view('page.lienhe');
    }
    public function getGioiThieu()
    {
    	return view('page.gioithieu');
    }
    public function getAddtoCart(Request $Request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $Request->session()->put('cart', $cart);
        return redirect()->back();
    }
    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0) {
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getCheckout()
    {   
        return view('page.dat_hang');
    }
    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill->note = $req->notes;
        $bill->save();

        foreach($cart->items as $key => $value)
        {
        $bill_detail = new BillDetail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product = $key;
        $bill_detail->quantity = $value['qty'];
        $bill_detail->unit_price = ($value['price']/$value['qty']);
        $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }

    public function login()
    {
        return view('page.login');
    }

    public function signup()
    {
        return view('page.signup');
    }

    public function signup1(Request $Request)
    {
        if($Request->password == $Request->repassword)
        {
        $user = new User;
        $this->validate($Request,
            [
                'name' => 'min:5|max:20',
                'phone' => 'numeric'
            ],
            [
                'name.min' => 'tên phải tối thiểu là 5 và tối đa là 20',
                'name.max' => 'tên phải tối thiểu là 5 và tối đa là 20',
                'phone.numeric' => 'Số điện thoại phải kiểu số'
            ]);
        $user->full_name = $Request->name;
        $user->email = $Request->email;
        $user->password = bcrypt($Request->password);
        $user->phone = $Request->phone;
        $user->address = $Request->address;
        $user->save();
        return redirect()->back()->with('thongbao', 'Đăng ký thành công');  
        }else{
        return redirect()->back()->with('thongbao', 'password và repassword phải trùng nhau');
        }
    }

    public function postlogin(Request $Request)
    {
        $this->validate($Request,
            [
              
                'password' => 'min:6|max:20'
            ],
            [
                'password.min' => 'mật khẩu tối thiểu 6 ký tự',
                'password.max' => 'mật khẩu tối đa 20 ký tự'
            ]);

        $credentials = array('email' => $Request->email, 'password' => $Request->password);
        if(Auth::attempt($credentials)){
            return redirect()->route('trang-chu');
        }else{
            return redirect()->back()->with('danger', 'Đăng nhập không thành công');
        }
    }

    public function getlogout()
    {
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getsearch(Request $Request)
    {   
        $product = Product::where('name', 'like', '%'.$Request->key.'%')->orWhere('unit_price', $Request->key)->get();
        return view('page.search', compact('product'));
    }
}
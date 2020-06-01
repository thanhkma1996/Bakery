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
use Hash;
use Auth;

class PageController extends Controller
{
    //
    public function getIndex() {
        $slide = Slide::all(); // lấy tất cả thông tin trong bảng slide
        // print_r($slide);
        // exit();
        // return view('page.trangchu',['slide' => $slide]); casch 1 để sử dụng slide ở App\Slide
        $new_product = Product::where('new',1)->paginate(4); // phân trang
        $top_product = Product::where('new',0)->paginate(8);
        
        return view('page.trangchu',compact('slide','new_product','top_product'));
    }

    public function  getProductType($type) {
        $product_type = Product::where('id_type',$type)->paginate(8);
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $sp_theoloai = ProductType::where('id',$type)->first();
        return view('page.producttype',compact('product_type','sp_khac','loai','sp_theoloai'));
    }

    public function  ProductDetail(Request $req) {
        $product_detail = Product::where('id',$req->id)->first();
        $product_related = Product::where('id_type',$product_detail->id_type)->paginate(3);
        $best_seller = Product::where('new',1)->get(); 
        return view('page.productdetail',compact('product_detail','product_related','best_seller'));
    }

    public function  Contacts() {
        return view('page.contacts');
    }

    public function  About() {
        return view('page.about');
    }

    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req -> session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDeletetoCart($id) {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart',$cart);
        }else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout() {
        return view('page.checkout');
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        // Cac cot trong database
        // Bien req se cho den cac name trong input de lay gia tri
      
        $customer->name = $req->username;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer -> save();

        $bill = new Bill;
        $bill-> id_customer = $customer->id;
        $bill-> date_order = date('Y-m-d');
        $bill-> total = $cart->totalPrice;
        $bill-> payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product= $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price'] / $value['qty']);
            $bill_detail->save();
        }

        Session::forget('cart');
        return redirect()->route('trang-chu')->with('thongbao','Đặt hàng thành công hãy tiếp tục mua hàng !!!');

    }

    public function getRegister() {
        return view('page.register');
    }

    public function postRegister(Request $req) {
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );

        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('register-success','Đăng kí tài khoản thành công');
    }

    public function getLogin() {
        return view('page.login');
    }

    public function postLogin(Request $req) {
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.max'=>'Mật khẩu ít nhất 20 kí tự',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );
        $credentials = array(
            'email'=>$req->email,
            'password' => $req->password
        );

        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['login-notif'=>'success','message'=>'Đăng nhập tài khoản thành công']);
        }else{
            return redirect()->back()->with(['login-notif'=>'danger','message'=>'Đăng nhập tài khoản không thành công']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
}

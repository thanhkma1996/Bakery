<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;

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
}

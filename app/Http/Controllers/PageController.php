<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;

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

    public function  ProductDetail() {
        return view('page.productdetail');
    }

    public function  Contacts() {
        return view('page.contacts');
    }

    public function  About() {
        return view('page.about');
    }
}

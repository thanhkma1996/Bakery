<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     // Khai báo bảng 
     protected $table = "products";
     
    public function producttype(){
        return $this -> belongsTo('App\ProductType','id_type','id');
    }

    public function bill_detail(){
        return $this -> hasMany('App\BillDetail','id_product','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    // Khai báo bảng 
    protected $table = "type_products";

    public function product(){
        return $this -> hasMany('App\Product','id_type','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    // Khai báo bảng 
    protected $table = "bill_detail";

    public function product(){
        return $this -> belongsTo('App\Product','id_product','id');
    }

    public function bill(){
        return $this -> belongsTo('App\Bill','id_bill','id');
    }
}

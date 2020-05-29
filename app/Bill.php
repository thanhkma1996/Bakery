<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    // Khai báo bảng 
    protected $table = "bills";

    public function bill_details(){
        return $this -> hasMany('App\BillDetail','id_bill','id');
    }

    public function customer(){
        return $this -> belongsTo('App\Customer','id_customer','id');
    }
}

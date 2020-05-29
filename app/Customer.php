<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
      // Khai báo bảng 
      protected $table = "customer";

      public function bill(){
        return $this -> hasMany('App\Bill','id_customer','id');
      }
}

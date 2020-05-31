<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('header', function ($views) {
            //
            $product_type = ProductType::all();
            $views->with('product_type',$product_type );
        });

        view()->composer('header',function($views){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $views->with([
                    'cart'=>Session::get('cart'),
                    'product_cart' => $cart->items,
                    'totalPrice'=>$cart->totalPrice,
                    'totalQty'=>$cart->totalQty
                ]);
            }
        });
    }
}

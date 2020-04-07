<?php

namespace App\Providers;
use App\Type_products;
use Session;

use Illuminate\Support\ServiceProvider;

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
        view()->composer('header', function($view){
            $loai_sp = Type_products::all();           
            $view -> with('loai_sp', $loai_sp);
        });

        view()->composer('header', function($view){
            if (Session::has('cart')) {
                $cart = Session::get('cart');
                $view -> with(['qty'=>$cart->totalQty, 'totalPrice'=>$cart->totalPrice, 'items'=>$cart->items]);
            }
        });
    }
}

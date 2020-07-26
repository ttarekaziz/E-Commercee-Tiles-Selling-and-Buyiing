<?php

namespace App\Providers;

use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $data;
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

        Schema::defaultStringLength(191);


       
            view()->composer('*', function($view) {
                if(Auth::check()){
                    $this->data = \Cart::session(auth()->user()->id)->getContent()->count();
                }
                if($this->data == null){
                    $this->data = 0;
                }
            $view->with('cartItems', $this->data );
                
        });
        

    }
}

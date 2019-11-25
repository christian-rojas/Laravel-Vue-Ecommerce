<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
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
            view()->composer('*', function (View $view) {
            $useradmin = Auth::user();
    
            if(!Auth::user()){
            if(Session::has('cart.items')){
            $incart = Session::get('cart.items');
            $numItems = (int)count($incart);
            $view->with('cont',$numItems);
            }else{
               $numItems = 0;
            $view->with('cont',$numItems); 
            }
            }else{
            $ids = Auth::user()->id;
            $status = DB::table('incart')->where([['user_id', '=' ,$ids],['status','=','no_pagado']])->count();

            if($status==null){
            $cero = 0;
            $status = $cero;
            $view->with('cont', $status);
            
            }else{

            $view->with('cont', $status);
            }
            }
        
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

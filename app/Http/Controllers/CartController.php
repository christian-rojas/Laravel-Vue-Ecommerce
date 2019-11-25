<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function add(Request $request){
    	   
            if(Auth::check()){
    		$id_user = Auth::user()->id;
    		$product_id = $request->id_product;
    		$cantidad = $request->cantidad;

    		DB::table('incart')->insertGetId(array(
            'id' => null,
            'user_id' => $id_user,
            'product_id' => $product_id,
            'cantidad' => $cantidad,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ));

            $count = DB::table('incart')->where([['user_id',$id_user],['status','no_pagado']])->count();
            $incart = DB::table('incart')->where([['user_id',$id_user],['status','no_pagado']])->get();
    		
    		return $this->show_cart();
    	    }else{
                
            $cantidad = $request->cantidad;
            $nombreP = $request->nombreP;
            Session::push('cart.items', $nombreP);
            Session::push('cart.cantidad',$cantidad);

            }
        return $this->show_cart();
    }

    public function show_cart(){
            $cantidad = Session::get('cart.cantidad');
            if(Auth::check()){
    		$id_user = Auth::user()->id;
            $count = DB::table('incart')->where([['user_id',$id_user],['status','no_pagado']])->count();
    		$incart = DB::table('incart')->join('products','incart.product_id','=','products.id')->where([['user_id',$id_user],['status','no_pagado']])->get();
            $total = DB::table('incart')->join('products','incart.product_id','=','products.id')->where([['incart.user_id','=',$id_user],['incart.status','=','no_pagado']])->sum('products.precio');
    		return view('incart')->with('incarts',$incart)->with('count',$count)->with('total',$total)->with('cantidad', $cantidad);
            }else{
            
            if(Session::has('cart.items')){
            $incart = Session::get('cart.items');
            $numItems = (int)count($incart);
            $total=0;
            $items = null;
            $quantity = null;
            $count = 0;
            foreach ($incart as $key) {
                $items[] = DB::table('products')->where('nombreP',$key)->get();
                
                $total = $total + DB::table('products')->where('nombreP',$key)->sum('precio');
                
            }
            foreach ($cantidad as $key) {
                
                $quantity[] = $key;
                
                $count++;
            }
            return view('incart',['items'=>$items],['cantidad'=>$quantity])->with('total',$total)->with('c',$cantidad);
            }else{
                $items=null;
                $quantity = null;
                return view('incart')->with('incarts',$items)->with('cantidad',$quantity);
            }
            
            }
    }

    public function delete(Request $request){

            if(Auth::check()){
            $id_user = Auth::user()->id;
            $product = $request->product_id;
            DB::table('incart')->where([['user_id',$id_user],['product_id',$product],['status','no_pagado']])->delete();
            }else{
            $string = Session::get('cart.items');    
            $numItems = (int)count($string)-1;
            $cantidad = Session::get('cantidad');
            $numItems2 = (int)count($cantidad)-1;
            session()->pull('cart.items.'.$numItems);
            session()->pull('cart.cantidad.'.$numItems2);
            }
            return $this->show_cart();
    }
}

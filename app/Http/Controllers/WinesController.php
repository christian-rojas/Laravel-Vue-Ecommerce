<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WinesController extends Controller
{
    public function vinos(){
    	$query = DB::table('products')->orderBy('created_at','desc')->get();
    	$count = DB::table('products')->count();
    	return view('Vinos')->with('products',$query)->with('count',$count);
    }
}

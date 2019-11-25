<?php
namespace App\Http\Controllers;
use PagoFacil\lib\Request;
use PagoFacil\lib\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;
use Redirect;
use Session;
use URL;
use Carbon\Carbon;
use Swap;
use App\User;
use Illuminate\Support\Facades\Mail;

class PagoController extends Controller
{
	public function pay(){

		//$incarts_id = Session::get('incarts_id');
  $request = new Request(); // Se crea el objeto Request
  			$cantidad = Session::get('cart.cantidad');
            if(Session::has('cart.items') && !Auth::user()){
        $string = Session::get('cart.items');  //esto devuelve un array de ids de productos
                 //el metodo de envio
        $email = Session::get('email');                 
        //$lastalla = end($talla);              //el ultimo valor del array
        //$items = null;
        $total = 0;
        $count = 0;
        foreach ($string as $key) {
        //$items[] = DB::table('products')->where('id',$key)->get();
        $total = $total + $cantidad[$count] * DB::table('products')->where('nombreP',$key)->sum('precio');
        $count++;
        }
        $request->account_id = '632419377143c7ee84bf4206dd7a0adbe55c488b316d55bb64b16c60f75370d9'; // Token Service entregado por Pago Facil
            /*este el de prueba*/
        //$request->account_id = 'f9eb17f82a9915d0a4ecca73ae5d080a53337662a78423778f33ce5bbba66021';
        $countcarts = DB::table('incart')->count();
        if($countcarts = null){

        $cont = 1;    
        Session::put('incarts_id',$cont);
        }else{
        $count = $countcarts;
        $cont = (int)$count+1;    
        Session::put('incarts_id',$cont);
        }
        

$request->amount = $total; // Monto de la transaccion
$request->currency = 'CLP'; // Moneda de la transaccion
$request->reference = $cont; // Numero de orden de la tienda
$request->customer_email = $email; // Email del cliente
$request->url_complete = 'https://www.grialwines.com/invoice/complete'; // URL a la cual se redirecciona el sistema
$request->url_cancel = 'https://www.grialwines.com/invoice/cancel'; // URL de cancelacion
$request->url_callback = 'https://www.grialwines.com/invoice/callback'; // URL de response 
$request->shop_country = 'CL'; // ISO Code de pais
$request->session_id = date('Ymdhis').rand(0,9).rand(0,9).rand(0,9); // ID de Session, se recominda que sea un valor dificil de replicar

$transaction = new Transaction($request); // Se crea la transaccion
$transaction->environment = 'DESARROLLO'; // Se especifica el ambiente en el cual se va a trabajar, puede ser DESSARROLLO, BETA o PRODUCCION

$transaction->setToken('ae24af196d549b97b6b54e6122391e0aea7ac93d621d9a7691d64ff66c57c06c'); // Se debe colocar el Token Secret entregado por Pago Facil
/*este el de prueba*/
//$transaction->setToken('efb654e60c5cc2bbedd989f9ae570220efc9ab00778f68c746555ff3f01fd34d');

$transaction->initTransaction($request); // Se inicia la transaccion enviando por parametros el request creado
        }else if(Auth::user()){
        //end Session

            $monto = DB::table('users')->join('incart','users.id','=','incart.user_id')->where([['status','no_pagado'],['user_id',Auth::user()->id]])->
            join('products','incart.product_id','=','products.id')->
            select(DB::raw('incart.cantidad * products.precio'));
            
            $incarts_id = DB::table('incart')->where([['status','no_pagado'],['user_id',Auth::user()->id]])->first();

            $idcarrito = Session::put('incarts_id',$incarts_id->id);
            Session::put('id',Auth::user()->id);

$request->account_id = '632419377143c7ee84bf4206dd7a0adbe55c488b316d55bb64b16c60f75370d9'; // Token Service entregado por Pago Facil
            /*este el de prueba*/
//$request->account_id = 'f9eb17f82a9915d0a4ecca73ae5d080a53337662a78423778f33ce5bbba66021';

$request->amount = $monto; // Monto de la transaccion
$request->currency = 'CLP'; // Moneda de la transaccion
$request->reference = $incarts_id->id; // Numero de orden de la tienda
$request->customer_email = Auth::user()->email; // Email del cliente
$request->url_complete = 'https://www.grialwines.com/invoice/complete'; // URL a la cual se redirecciona el sistema
//$request->url_complete = 'localhost/mondano4/invoice/complete';
$request->url_cancel = 'https://www.grialwines.com/invoice/cancel'; // URL de cancelacion
$request->url_callback = 'https://www.grialwines.com/invoice/callback'; // URL de response 
//$request->url_callback = 'localhost/mondano4/invoice/callback';
$request->shop_country = 'CL'; // ISO Code de pais
$request->session_id = date('Ymdhis').rand(0,9).rand(0,9).rand(0,9); // ID de Session, se recominda que sea un valor dificil de replicar

$transaction = new Transaction($request); // Se crea la transaccion
$transaction->environment = 'DESARROLLO'; // Se especifica el ambiente en el cual se va a trabajar, puede ser DESARROLLO, BETA o PRODUCCION

$transaction->setToken('3116db582f5f09b17222564faa9e7e138882c4ad0f2cee13e3c8b0ec22ac9585'); // Se debe colocar el Token Secret entregado por Pago Facil
/*este el de prueba*/
//$transaction->setToken('efb654e60c5cc2bbedd989f9ae570220efc9ab00778f68c746555ff3f01fd34d');

$transaction->initTransaction($request); // Se inicia la transaccion enviando por parametros el request creado
}
}

public function callback(){
	$transaction = new Transaction();
$transaction->setToken('ae24af196d549b97b6b54e6122391e0aea7ac93d621d9a7691d64ff66c57c06c'); // Se debe colocar el Token Secret entregado por Pago Fácil
  /*este el de prueba*/
//$transaction->setToken('efb654e60c5cc2bbedd989f9ae570220efc9ab00778f68c746555ff3f01fd34d');

if($transaction->validate($_POST)){
  error_log('TRANSACCION CORRECTA');
  return view('invoice.callback');
}else{
  error_log('ERROR FIRMA');
  return view('/');
}
}


  public function complete(){

  $idcarrito = Session::get('incarts_id');
  if(Auth::user()){
  $user = Auth::user()->id;
  
  DB::table('incart')->where('user_id','=',$user)->where('id',$idcarrito)->update(['status'=>'pagado']);
  
    
  return view('invoice.complete');
            
        }else{
          

          $mesdia = Carbon::now();
      $año = $mesdia->year;
        $dia = $mesdia->day;
      $mes = $mesdia->month;
      $hora = $mesdia->hour;
      $minuto = $mesdia->minute;
      $segundo = $mesdia->second;
      $date = $año.$mes.$dia.$hora.$minuto.$segundo;
          $incarts_id = Session::get('incarts_id');
          $users_id = Session::get('users_id');
          $string = Session::get('cart.items'); 
          $cantidad = Session::get('cantidad');
          //$id = DB::table('address_session')->where('email',$email)->first();
          $count = 0;
          foreach ($string as $key) {
            $incarts = DB::table('incart')->insertGetId(array(
        'id' => null,
        'user_id' => '100'.$users_id,
        'product_id' => $key,
        'cantidad' => $cantidad[$count],
        'status' => 'pagado',
        "created_at" =>  Carbon::now(), # \Datetime()
        "updated_at" => Carbon::now()
      ));
            $count++;
          
        }
          return view('invoice.complete');
}
}
}



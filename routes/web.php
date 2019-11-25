<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('nosotros', function () {
    return view('nosotros');
});
Route::get('incart','CartController@show_cart');
Route::post('/','CartController@delete');
Route::post('Vinos','CartController@add');
Route::get('Vinos','WinesController@vinos');
Route::resource('products','ProductsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('pagar',function(){
  return view('pagar');
});

Route::get('pagar','PagoController@pay');
Route::post('invoice/callback','PagoController@callback');
Route::post('invoice/cancel','PagoController@cancel');
Route::post('invoice/complete','PagoController@complete');
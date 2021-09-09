<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Item;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;

class MailSendController extends Controller
{
    public function send(Request $request ){

        $auths=Auth::user();
        $carts = Cart::content();
        $totalpay=Cart::total();
        $totalpay = str_replace(',', '',$totalpay);
        $totalpay = intval($totalpay)+1000;
        $totalpay = number_format($totalpay);
        $subtotalpay=Cart::subtotal();
        $tax=Cart::tax();


        $shippingzipcode=$auths->zipcode;
        $shippingaddress1=$auths->address1;
        $shippingaddress2=$auths->address2;
        $shippingname=$auths->name;


    	$data = [
            'carts' => $carts,
            'totalpay'=>$totalpay,
            'shippingzipcode' =>$auths->zipcode,
            'shippingaddress1'=>$auths->address1,
            'shippingaddress2'=>$auths->address2,
            'shippingname'    =>$auths->name,
                ];

    	Mail::send('emails.receiptadmin', $data, function($message){
    	    $message->to('nightmare.sena122@gmail.com', 'Test')
            ->subject('This is a test mail');
    	});
    }
    //
    public function sendreceiptemail(){

    	$data = [];

    	Mail::send('emails.recept', $data, function($message){
    	    $message->to('nightmare.sena122@gmail.com', 'Test')
            ->subject('This is a test mail');
    	});
    }
}

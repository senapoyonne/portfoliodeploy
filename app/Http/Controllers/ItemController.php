<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Item;
use Gloudemans\Shoppingcart\Facades\Cart;

class ItemController extends Controller
{
    //
    protected $dates = ['created_at', 'updated_at',];
    public function show($param)
    {
        $user=Auth::user();
        $fav=0;
        if(!is_null($user)){//もしユーザーがログインしてる場合の処理
            if(!is_null($user->items->find($param))){
                $fav =1;
            }
        }
        // dd($fav);
        $data = Item::find($param);
        return view('item',compact('data','fav'));
    }

    public function addtocart($param, Request $request){
        $item = Item::findOrFail($param);
        
        try{
        Cart::add([
            [
                'id' => $item->product_id,
                'name' => $item->product_name,
                'qty' => $request->quantity,
                'price' => $item->product_price,
                'weight' => '1',
                'options' => ['product_imgpath1'=> $item->product_imgpath1]
                ]
            ]);  
        } catch (Exception $e) {
            dd('erroe');
        }     
            
        // $carts = Cart::content();
        return redirect()->action('ShoppingcartController@show');
    }

    public function itemfav($param){
    $user=Auth::user();
    $user->items()->attach($param);
    return back();
    }

    public function itemunfav($param){
        $user=Auth::user();
        $user->items()->detach($param);
        return back();
        }
}

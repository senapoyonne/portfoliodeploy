<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Item;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingcartController extends Controller
{
    public function show(Request $request)
    {
        $carts = Cart::content();
                //セッションに保存していた値を取得し、変数として定義
                // $SessionData = $request->session()->get('session_data');
                //セッションデータのなかのそれぞれのデータを抽出
                // $SessionProductId = array_column($SessionData, 'SessionProductId');
                // $SessionProductQuantity = array_column($SessionData, 'SessionProductQuantity');                           
                // $data = $request->session()->all();
                // $items= Item::find($SessionProductId);
                // dd($carts);
            $totalpay=Cart::total();
            $totalpay = str_replace(',', '',$totalpay);
            $totalpay = intval($totalpay)+1000;
            $totalpay = number_format($totalpay);
            $subtotalpay=Cart::subtotal();
            $tax=Cart::tax();
            // dd($carts,$totalpay);
            return view('shoppingcart.shoppingcart',compact('carts','totalpay','subtotalpay','tax'));
    }
    public function delete($param){
        $rowId=$param;
        Cart::remove($rowId);
        return back();
    }
    public function confirm(Request $request){

        $auths=Auth::user();
        $carts = Cart::content();
        $totalpay=Cart::total();
        $totalpay = str_replace(',', '',$totalpay);
        $totalpay = intval($totalpay)+1000;
        $totalpay = number_format($totalpay);
        $subtotalpay=Cart::subtotal();
        $tax=Cart::tax();
        return view('shoppingcart.cashier',compact('carts','totalpay','subtotalpay','tax','auths'));
    }

    public function confirmaddress(Request $request){
        $auths=Auth::user();

        $shippingzipcode=$auths->zipcode;
        $shippingaddress1=$auths->address1;
        $shippingaddress2=$auths->address2;
        $shippingname=$auths->name;

        // dd($request);
        if (isset($request->postalcode) and isset($request->address1)){

            if($request->remember == "on"){//配送先を保存するとき
                
                $auths->name=$request->username;            
                $auths->zipcode=$request->postalcode;
                $auths->address1=$request->address1;
                $auths->address2=$request->address2;
                $auths->save();
            }
            $shippingzipcode=$request->postalcode;
            $shippingaddress1=$request->address1;
            $shippingaddress2=$request->address2;
            $shippingname=$request->username;
        }

        $carts = Cart::content();
        $totalpay=Cart::total();
        $totalpay = str_replace(',', '',$totalpay);
        $totalpay = intval($totalpay)+1000;
        $totalpay = number_format($totalpay);
        $subtotalpay=Cart::subtotal();
        // $tax=Cart::tax();
        // dd($shippingaddress1);
        return view('shoppingcart.confirm',compact('carts','totalpay','subtotalpay','auths','shippingzipcode','shippingaddress1','shippingaddress2','shippingname'));
    }
    //

    public function storePaymentInfo(Request $request){
        /**
         * フロントエンドから送信されてきたtokenを取得
         * これがないと一切のカード登録が不可
         **/
        $token = $request->stripeToken;
        $user = Auth::user(); //要するにUser情報を取得したい
        $ret = null;

        /**
         * 当該ユーザーがtokenもっていない場合Stripe上でCustomer（顧客）を作る必要がある
         * これがないと一切のカード登録が不可
         **/
        if ($token) {

            /**
             *  Stripe上にCustomer（顧客）が存在しているかどうかによって処理内容が変わる。
             *
             * 「初めての登録」の場合は、Stripe上に「Customer（顧客」と呼ばれる単位の登録をして、その後に
             * クレジットカードの登録が必要なので、一連の処理を内包しているPaymentモデル内のsetCustomer関数を実行
             *
             * 「2回目以降」の登録（別のカードを登録など）の場合は、「Customer（顧客」を新しく登録してしまうと二重顧客登録になるため、
             *  既存のカード情報を取得→削除→新しいカード情報の登録という流れに。
             *
             **/

            if (!$user->stripe_id) {
                $result = Payment::setCustomer($token, $user);

                /* card error */
                if(!$result){
                    $errors = "カード登録に失敗しました。入力いただいた内容に相違がないかを確認いただき、問題ない場合は別のカードで登録を行ってみてください。";
                    return redirect('#')->with('errors', $errors);
                }

            } else {
                $defaultCard = Payment::getDefaultcard($user);
                if (isset($defaultCard['id'])) {
                    Payment::deleteCard($user);
                }

                $result = Payment::updateCustomer($token, $user);

                /* card error */
                if(!$result){
                    $errors = "カード登録に失敗しました。入力いただいた内容に相違がないかを確認いただき、問題ない場合は別のカードで登録を行ってみてください。";
                    return redirect('#')->with('errors', $errors);
                }

            }
        } else {
            return redirect('/user/payment/form')->with('errors', '申し訳ありません、通信状況の良い場所で再度ご登録をしていただくか、しばらく立ってから再度登録を行ってみてください。');
        }


        return redirect('/user/payment')->with("success", "カード情報の登録が完了しました。");
    }

}

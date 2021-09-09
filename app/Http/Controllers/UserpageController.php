<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\ChangePasswordRequest;

class UserpageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
     $auths=Auth::user();

    return view('user',compact('auths'));
    }

    public function patch(Request $request){
        $auths=Auth::user();
        $auths->name=$request->username;
        $auths->email=$request->useremail;
        $auths->zipcode=$request->postalcode;
        $auths->address1=$request->address1;
        $auths->address2=$request->address2;
        $auths->save();
       return view('user',compact('auths'));
       }


 public function ChangePasswordForm()
 {
     return view('passwordchange');
 }

 public function changePassword(ChangePasswordRequest $request)
 {
     //ValidationはChangePasswordRequestで処理
     //パスワード変更処理
     $user = Auth::user();
     $user->password = bcrypt($request->get('password'));
     $user->save();

     //homeにリダイレクト
     return redirect()->route('userpage')->with('status', __('Your password has been changed.'));
    //
}

public function itemfav()
{
    $user = Auth::user();
    $items=$user->items->toArray();
    // dd($items);
    return view('useritemfav',compact('items'));
}

}



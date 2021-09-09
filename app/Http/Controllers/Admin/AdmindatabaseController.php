<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Builder;
use App\User;
use App\Category;
use Mail;
use App\Item;


class AdmindatabaseController extends Controller
{
    //
    public function index()
    {

        // $categories = Category::showcategories();
        // $builders = Builder::showbuilders();
        $items = Item::orderBy('product_stock', 'asc')->simplePaginate(10);   // Eloquent"Member"で全データ取得
        // return view('admin.itemmanage', [
        //     "items" => $items,
        // ]);
       return view('admin.itemdataindex',compact('items'));


    }

    
    public function search(Request $request,$param =null)
    {
        
        // $builders = Builder::showbuilders();
        
        // $categories = Category::showcategories();
        // if(!is_null($param)){
            //     $items= Item::where('product_builder', 'like', "%$param%")
            //                 ->orwhere('product_category', 'like', "%$param%")
            //                 ->simplePaginate(2);
            // return view('searchresult',compact('events','items','builders','categories'));
            // }
            
            $keyword= $request->keyword;
            $items= Item::where('product_name', 'like', "%$keyword%")
            ->orwhere('product_category', 'like', "%$keyword%")->orderBy('product_stock', 'asc')
            ->simplePaginate(10);
            // dd($items);
            return view('admin.adminsearchresult',compact('items'));
            //
            
        }
        
        public function userindex()
        {
    
            $users = user::orderBy('created_at', 'asc')->simplePaginate(10);   // Eloquent"Member"で全データ取得
            // return view('admin.itemmanage', [
            //     "items" => $items,
            // ]);
           return view('admin.userdataindex',compact('users'));
    
    
        }

        public function usersearch(Request $request,$param =null)
        {
            
            // $builders = Builder::showbuilders();
        
        // $categories = Category::showcategories();
        if(!is_null($param)){
            $users= User::where('name', 'like', "%$param%")
                        ->orwhere('email', 'like', "%$param%")
                        ->orwhere('zipcode', 'like', "%$param%")
                        ->orwhere('address1', 'like', "%$param%")
                        ->orwhere('address2', 'like', "%$param%")
                        ->simplePaginate(10);
        return view('admin.adminusersearchresult',compact('users'));
        }

        $keyword= $request->keyword;
        $users= User::where('name', 'like', "%$keyword%")
            ->orwhere('email', 'like', "%$keyword%")
            ->orwhere('zipcode', 'like', "%$keyword%")
            ->orwhere('address1', 'like', "%$keyword%")
            ->orwhere('address2', 'like', "%$keyword%")
            ->simplePaginate(10);
        // dd($items);
        return view('admin.adminusersearchresult',compact('users'));
        //

        }

        public function usereditpage($param){
            $user= User::find($param);
            return view('admin.useredit',compact('user'));
        }


        public function usereditpatch(Request $request,$param){
            $user= User::find($param);
            $user->name=$request->username;
            $user->email=$request->useremail;
            $user->zipcode=$request->postalcode;
            $user->address1=$request->address1;
            $user->address2=$request->address2;
            $user->save();
            return redirect('/admin/poyopoyopage/userdatabase/edit/'.$param);
        }

}

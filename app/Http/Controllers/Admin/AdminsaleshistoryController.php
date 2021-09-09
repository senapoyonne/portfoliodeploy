<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Saleshistory;

class AdminsaleshistoryController extends Controller
{
    public function index(){

        $histories = Saleshistory::orderBy('created_at', 'desc')->simplePaginate(10); 
        return view('admin.saleshistory',compact('histories'));

        }

    public function historysearch(Request $request,$param =null){

        $keyword= $request->keyword;
        $histories= Saleshistory::where('product_name', 'like', "%$keyword%")
        ->orwhere('customer_name', 'like', "%$keyword%")->orderBy('created_at', 'desc')
        ->simplePaginate(10);
        // dd($items);
        return view('admin.saleshistory',compact('histories'));
    }    
    //
}

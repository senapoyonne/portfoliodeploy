<?php

namespace App\Http\Controllers;

use App\information;
use App\Item;
use App\Builder;
use App\Category;
use Illuminate\Http\Request;

class ToppageController extends Controller
{

    public function index(Request $request)
    {

        $events = information::showfourevent();
        $builders = Builder::showbuilders();
        $items = Item::showitems();
        $categories = Category::showcategories();

        return view('toppage',compact('events','items','builders','categories'));
    }

    public function aboutus()
    {

        return view('aboutus');
    }
    //

    public function search(Request $request,$param =null)
    {
        $events = information::showfourevent();
        $builders = Builder::showbuilders();
        
        $categories = Category::showcategories();
        if(!is_null($param)){
            $items= Item::where('product_builder', 'like', "%$param%")
                        ->orwhere('product_category', 'like', "%$param%")
                        ->paginate(6);
        return view('searchresult',compact('events','items','builders','categories','param'));
        }

        $param= $request->keyword;
        $items= Item::where('product_name', 'like', "%$param%")
                    ->orwhere('product_category', 'like', "%$param%")
                    ->paginate(6);
        // dd($items);
        return view('searchresult',compact('events','items','builders','categories','param'));
        //
    }

    public function viewall()
    {
        $builders = Builder::showbuilders();
        $items = Item::paginate(6);
        $categories = Category::showcategories();
        return view('viewall',compact('builders','items','categories'));
    }
}

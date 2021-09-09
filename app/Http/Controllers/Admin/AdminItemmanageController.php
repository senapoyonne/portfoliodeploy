<?php

namespace App\Http\Controllers\Admin;
use App\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Builder;
use App\Category;

class AdminItemmanageController extends Controller
{
    //
    public function itempatch($param,Request $request)

    {
        // dd($request->file("file1"));
        $data = Item::find($param);

        if($request->file("file1")!= null){
            // $request->file('file1')->storeAs("public/itempic",substr("$data->product_imgpath1",8)); 
            $path1 = $data->product_imgpath1;
            Storage::delete('public/'.$path1);
            $filenameWithExt = $request->file("file1")->getClientOriginalName();
            //ファイル名のみを取得
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //拡張子を取得
            $extension = $request->file("file1")->getClientOriginalExtension();
            //保存のファイル名を構築
            $filenameToStore1 = $filename."_".time().".".$extension;
            $path1 = $request->file("file1")->storeAs("public/itempic", $filenameToStore1);
            $data->product_imgpath1 =substr("$path1",7);       
        }

        if($request->file("file2")!= null){
            // $request->file('file2')->storeAs("public/itempic",substr("$data->product_imgpath2",8));
            $path2 = $data->product_imgpath2;
            Storage::delete('public/'.$path2);
            $filenameWithExt = $request->file("file2")->getClientOriginalName();
            //ファイル名のみを取得
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //拡張子を取得
            $extension = $request->file("file2")->getClientOriginalExtension();
            //保存のファイル名を構築
            $filenameToStore2 = $filename."_".time().".".$extension;
            $path2 = $request->file("file2")->storeAs("public/itempic", $filenameToStore2);
            $data->product_imgpath2 =substr("$path2",7);
        }

        if($request->file("file3")!= null){
            // $request->file('file3')->storeAs("public/itempic",substr("$data->product_imgpath3",8));
            $path3 = $data->product_imgpath3;
            $filenameWithExt = $request->file("file3")->getClientOriginalName();
            //ファイル名のみを取得
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //拡張子を取得
            $extension = $request->file("file3")->getClientOriginalExtension();
            //保存のファイル名を構築
            $filenameToStore3 = $filename."_".time().".".$extension;
            $path3 = $request->file("file3")->storeAs("public/itempic", $filenameToStore3);
            $data->product_imgpath3 =substr("$path3",7);
        }

        $data->product_name = $request->itemname;
        $data->product_category =$request->itemcategory;
        $data->product_builder =$request->itembuilder; 
        $data->product_price =$request->itemprice;
        $data->product_description =$request->itemdescription;
        $data->product_weight =$request->itemweight;
        $data->product_size =$request->itemsize;
        $data->product_stock =$request-> itemstock;

        
        $data->save();

        return view('admin.itemedit',compact('data'));       
        
    }


    public function itemedit($param)
    {
        $data = Item::find($param); 
        $builders = Builder::showbuilders();  // Eloquent"Member"で全データ取得
        return view('admin.itemedit',compact('data','builders'));
        
    }

    public function destroy($param)
    {
        $data = Item::find($param);
        $path1 = $data->product_imgpath1;
        $path2 = $data->product_imgpath2;
        $path3 = $data->product_imgpath3;
        Item::destroy($param);
        Storage::delete('public/'.$path1);
        Storage::delete('public/'.$path2);
        Storage::delete('public/'.$path3);
        return back();        
    }

    public function itemmanage()
    {
        $categories = Category::showcategories();
        $builders = Builder::showbuilders();
        $items = Item::simplePaginate(10); 
        // $items = Item::all();   
        // return view('admin.itemmanage', [
        //     "items" => $items,
        // ]);
       return view('admin.itemmanage',compact('items','builders','categories'));
        
    }

    public function itemupload(Request $request)
    {
        $item = new \App\Item;

        if($request->file("file1")!= null){
        //拡張子付きでファイル名を取得
        $filenameWithExt = $request->file("file1")->getClientOriginalName();
        //ファイル名のみを取得
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //拡張子を取得
        $extension = $request->file("file1")->getClientOriginalExtension();
        //保存のファイル名を構築
        $filenameToStore1 = $filename."_".time().".".$extension;
        $path1 = $request->file("file1")->storeAs("public/itempic", $filenameToStore1);
        $item->product_imgpath1 =substr("$path1",7);}

        if($request->file("file2")!= null){
        //拡張子付きでファイル名を取得
        $filenameWithExt = $request->file("file2")->getClientOriginalName();
        //ファイル名のみを取得
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //拡張子を取得
        $extension = $request->file("file2")->getClientOriginalExtension();
        //保存のファイル名を構築
        $filenameToStore2 = $filename."_".time().".".$extension;
        $path2 = $request->file("file2")->storeAs("public/itempic", $filenameToStore2);
        $item->product_imgpath2 =substr("$path2",7);}   

        if($request->file("file3")!= null){
        //拡張子付きでファイル名を取得
        $filenameWithExt = $request->file("file3")->getClientOriginalName();
        //ファイル名のみを取得
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //拡張子を取得
        $extension = $request->file("file3")->getClientOriginalExtension();
        //保存のファイル名を構築
        $filenameToStore3 = $filename."_".time().".".$extension;
        $path3 = $request->file("file3")->storeAs("public/itempic", $filenameToStore3);
        $item->product_imgpath3 =substr("$path3",7);}     
 

        $item->product_name = $request->itemname;
        $item->product_category =$request->itemcategory;
        $item->product_builder =$request->itembuilder; 
        $item->product_price =$request->itemprice;
        $item->product_description =$request->itemdescription;
        $item->product_weight =$request->itemweight;
        $item->product_size =$request->itemsize;
        $item->product_stock =$request-> itemstock;

        
        $item->save();

        return back();
    }
}

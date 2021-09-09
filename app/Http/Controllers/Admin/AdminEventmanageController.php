<?php

namespace App\Http\Controllers\Admin;
use App\information;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminEventmanageController extends Controller
{
    //
    public function index()
    {
        $infos = information::all();   // Eloquent"Member"で全データ取得
        return view('admin.eventmanage', [
            "infos" => $infos
        ]);
        
    }
    public function create(Request $request)
    {
        //拡張子付きでファイル名を取得
        $filenameWithExt = $request->file("eventpic")->getClientOriginalName();

        //ファイル名のみを取得
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //拡張子を取得
        $extension = $request->file("eventpic")->getClientOriginalExtension();

        //保存のファイル名を構築
        $filenameToStore = $filename."_".time().".".$extension;

        $path = $request->file("eventpic")->storeAs("public/eventpic", $filenameToStore);


        $info = new \App\information;
        $info->info_title = $request->title;
        $info->info_category =$request->category;
        $info->info_detailtext=$request->description; 
        $info->info_imgpath1=$filenameToStore;
        $info->save();

        return back();
    }

    public function editpage($param)
    {
        $data =information::find($param);
        return view('admin.eventedit',compact('data'));
    }

    public function destroy($param)
    {
        information::destroy($param);
        return back();
    }

    public function editpatch($param,Request $request)
    {
        $data =information::find($param);
        $data->info_title = $request->title;
        $data->info_category =$request->category;
        $data->info_detailtext=$request->description; 
        $data->save();
        
        return view('admin.eventedit',compact('data'));
    }

}

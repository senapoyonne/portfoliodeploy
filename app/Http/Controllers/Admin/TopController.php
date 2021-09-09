<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Builder;
use App\Category;
use Mail;

class TopController extends Controller
{
    //管理者ページ
    public function index()
    {
        $builders = Builder::showbuilders();
        $categories = Category::showcategories();
        return view('admin.top',compact('builders','categories'));
    }

    public function headimgcreate(Request $request)
    {
        if($request->file("file1")!= null){
            // $request->file('file1')->storeAs("public/itempic",substr("$data->product_imgpath1",8)); 
            Storage::delete('public/headimg/headimg1.jpg');
            $request->file('file1')->storeAs('public/headimg','headimg1.jpg');     
        }
        if($request->file("file2")!= null){
            // $request->file('file1')->storeAs("public/itempic",substr("$data->product_imgpath1",8)); 
            Storage::delete('public/headimg/headimg2.jpg');
            $request->file('file2')->storeAs('public/headimg','headimg2.jpg');     
        }
        if($request->file("file3")!= null){
            // $request->file('file1')->storeAs("public/itempic",substr("$data->product_imgpath1",8)); 
            Storage::delete('public/headimg/headimg3.jpg');
            $request->file('file3')->storeAs('public/headimg','headimg3.jpg');     
        }

        // $request->file('file1')->storeAs('public/headimg','headimg1.jpg');
        // $request->file('file2')->storeAs('public/headimg','headimg2.jpg');
        // $request->file('file3')->storeAs('public/headimg','headimg3.jpg');
        return back();
    }


    public function builderindex(){
        $builders = Builder::showbuilders();
        return view('admin.builderindex',compact('builders'));
    }

    public function addbuilder(Request $request)
    {
        $builder= new \App\Builder;
        $builder->name = $request->buildername;
        $builder->email = $request->buildermail;
        $builder->save();

        $name = $request->buildername;
        $email = $request->buildermail;

        $data = [
            'buildername' => $name,
            'builderemail' => $email,
                ];
        Mail::send('emails.builderregist', $data, function($message)use ($email) { 
            // dd($builder);                     
            $message->to($email)
            ->subject('ビルダー登録が完了しました');
        });  

        return back();
    }


    public function deletebuilder(Request $request)
    {
        $buildername= $request->buildername;
        // dd($buildername);
        Builder::where('name',$buildername)->delete();
    
        return back();
    }

    public function addcategory(Request $request)
    {
        $category= new \App\Category;
        $category->name = $request->categoryname;
        $category->save();
        return back();
    }

    public function deletecategory(Request $request)
    {
        $categoryname= $request->categoryname;
        // dd($buildername);
        Category::where('name',$categoryname)->delete();
    
        return back();
    }


}

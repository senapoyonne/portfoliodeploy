@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="card col-12 px-0 mb-4">
            <div class="card-header">既存在庫商品の管理</div>

                <div class="card-body">
    @php
    $id=$data->product_id;
    @endphp
                    <form method="post" action="{!! url('/admin/poyopoyopage/itemmanage/edit/'.$id) !!}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="商品画像1">商品画像1</label>
                            <input type="file" class="form-control-file col-4" id="itempicture1" name="file1">
                        </div>
                        <div class="form-group">
                            <label for="商品画像2">商品画像2</label>
                            <input type="file" class="form-control-file col-4" id="itempicture2" name="file2">
                        </div>
                        <div class="form-group">
                            <label for="商品画像2">商品画像3</label>
                            <input type="file" class="form-control-file col-4" id="itempicture3" name="file3">
                        </div>

                        <div class="form-group">
                            <label for="formGroupItemTitleleInput">商品名</label>
                            <input type="text" class="form-control" id="formGroupItemTitleleInput" placeholder="商品名" name="itemname" value="{{$data->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupItemCategoryInput">カテゴリ</label>
                            <input type="text" class="form-control" id="formGroupItemCategoryInput" placeholder="カテゴリ" name="itemcategory" value="{{$data->product_category}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupItemBuilderInput">ビルダー</label>
                            <input type="text" class="form-control" id="formGroupItemBuilderInput" placeholder="メーカー" name="itembuilder" value="{{$data->product_builder}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupItemvalueInput">値段</label>
                            <input type="number" class="form-control" id="formGroupItemvalueInput" placeholder="999999" name="itemprice" value="{{$data->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="ItemDescription">商品の説明</label>
                            <textarea class="form-control" id="ItemDescription" rows="3" name="itemdescription">{{$data->product_description}}</textarea>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="weight">重さ</label>
                              <input type="text" class="form-control" placeholder="重さ" name="itemweight" value="{{$data->product_weight}}">
                            </div>
                            <div class="col">
                                <label for="size">サイズ</label>
                              <input type="text" class="form-control" placeholder="サイズ" name="itemsize" value="{{$data->product_size}}">
                            </div>
                            <div class="col">
                                <label for="size">在庫数</label>
                              <input type="number" class="form-control" placeholder="99999" name="itemstock" value="{{$data->product_stock}}">
                            </div>
                            
                        </div>

                        <button type="submit" class="btn btn-primary col-12">登録</button>
                    </form>
                </div><!-- card body -->
            </div>     

        </div><!--card-->    
        <div class="row">
            {{-- <div class="card col-12 px-0">    
                    <div class="card-header">既存商品の管理</div>
                <div class="card-body">
    
                        <table class="table table-hover">
                            <tbody>
                            @foreach($items as $item)
                            @php
                                $id=$item->id;
                            @endphp
                              <tr>
                                <td colspan="3">
                                    <a href="{!! url('/item/'.$id) !!}"><span pr-4> {{$item->product_name}}</span>
                                </td>
                                <td colspan="1" style="width:10%;height:5%;">

                                    <td colspan="1" style="width:10%;height:5%;">
                                        <form style="width:100%;height:100%;" >@csrf<button href="{!! url('/admin/poyopoyopage/eventmanage/delete/'.$id) !!}" type="submit" class="btn btn-primary">編集</button></form>
    

                                    </td>  
                                </td>
                                <td colspan="1" style="width:10%;height:5%;">
                                    <form style="width:100%;height:100%;" method="POST" action="{!! url('/admin/poyopoyopage/eventmanage/delete/'.$id) !!}">@method('delete')@csrf<button type="submit" class="btn btn-danger">削除</button></form>
    

                                </td>                                   
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
    
                        
                
                </div>
            </div> --}}
        </div>
    </div><!--row-->
</div>    




@endsection
@extends('layouts.admin')

@section('content')


<div class="container">
    <div class="row px-2">
        <div class="card col-12 px-0 mb-4">
            <div class="card-header">新規商品登録</div>

                <div class="card-body">
                    <form method="post" action="{{ route('itemupload') }}" enctype="multipart/form-data">
                        @csrf
                        <p>商品画像は600×600にしてください。</p>
                        <div class="form-group">
                            <label for="商品画像1">商品画像1</label>
                            <input type="file" class="form-control-file col-12" id="itempicture1" name="file1">
                        </div>
                        <div class="form-group">
                            <label for="商品画像2">商品画像2</label>
                            <input type="file" class="form-control-file col-12" id="itempicture2" name="file2">
                        </div>
                        <div class="form-group">
                            <label for="商品画像2">商品画像3</label>
                            <input type="file" class="form-control-file col-12" id="itempicture3" name="file3">
                        </div>

                        <div class="form-group">
                            <label for="formGroupItemTitleleInput">商品名</label>
                            <input type="text" class="form-control" id="formGroupItemTitleleInput" placeholder="商品名" name="itemname">
                        </div>
                        <div class="form-group">
                            <label for="formGroupItemCategoryInput">カテゴリ</label><br>
                            <select class="" name="itemcategory">
                                <option value="0">---選択されていません--</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupItemBuilderInput">ビルダー</label><br>
                            <select class="" name="itembuilder">
                                <option value="0">---選択されていません--</option>
                                @foreach ($builders as $item)
                                <option value="{{$item->name}}">{{$item->name}}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupItemvalueInput">値段</label>
                            <input type="number" class="form-control" id="formGroupItemvalueInput" placeholder="999999" name="itemprice">
                        </div>
                        <div class="form-group">
                            <label for="ItemDescription">商品の説明</label>
                            <textarea class="form-control" id="ItemDescription" rows="3" name="itemdescription"></textarea>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="weight">重さ</label>
                              <input type="text" class="form-control" placeholder="重さ" name="itemweight">
                            </div>
                            <div class="col">
                                <label for="size">サイズ</label>
                              <input type="text" class="form-control" placeholder="サイズ" name="itemsize">
                            </div>
                            <div class="col">
                                <label for="size">在庫数</label>
                              <input type="number" class="form-control" placeholder="99999" name="itemstock">
                            </div>
                            
                        </div>

                        <button type="submit" class="btn btn-primary col-12">登録</button>
                    </form>
                </div><!-- card body -->
            </div>     

        </div><!--card-->    
        <div class="row">
            <div class="card col-12 px-0">    
                    <div class="card-header">既存商品の管理</div>
                <div class="card-body">
                    {{-- <ul class="list-group list-group"> --}}
                        
                        {{-- <li class="list-group-item">
                            <div>
                               <span> {{$info->info_title}}</span><a href="{{ url('/') }}" class="py-6 btn btn-primary btn-sm active" role="button" aria-pressed="true">この記事を編集　</a>
                            </div>
                        </li> --}}
    
                        <table class="table table-hover">
                            <tbody>
                            {{ $items->links() }}
                            @foreach($items as $item)
                            @php
                                $id=$item->product_id;
                            @endphp
                              <tr>
                                <td colspan="3">
                                    <a href="{!! url('/item/'.$id) !!}"><span pr-4> {{$item->product_name}}</span>
                                </td>
                                <td colspan="1" style="width:10%;height:5%;">
                                    {{-- <form style="width:100%;height:100%;">
                                        <button href="{!! url('/admin/poyopoyopage/eventmanage/edit/'.$id) !!}" style="width:100%;height:100%;" class=" btn btn-primary btn-sm active" role="button" aria-pressed="true">編集　</button>
                                    </form> --}}
                                    <td colspan="1" style="width:10%;height:5%;">
                                        <form style="width:100%;height:100%;" method="GET"><button onclick='location.href="{!! url('/admin/poyopoyopage/itemmanage/edit/'.$id) !!}"'  type="button" class="btn btn-primary">編集</button></form>
    
                                        {{-- <div class="text-right">
                                            <a href="{!! url('/admin/poyopoyopage/eventmanage/delete/'.$id) !!}" class=" btn btn-danger btn-sm active" role="button" aria-pressed="true">この記事を削除　</a>
                                         </div> --}}
                                    </td>  
                                </td>
                                <td colspan="1" style="width:10%;height:5%;">
                                    <form style="width:100%;height:100%;" method="POST" action="{!! url('/admin/poyopoyopage/itemmanage/delete/'.$id) !!}">@method('delete')@csrf<button type="submit" class="btn btn-danger">削除</button></form>
    
                                    {{-- <div class="text-right">
                                        <a href="{!! url('/admin/poyopoyopage/eventmanage/delete/'.$id) !!}" class=" btn btn-danger btn-sm active" role="button" aria-pressed="true">この記事を削除　</a>
                                     </div> --}}
                                </td>                                   
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
    
                        
                    {{-- </ul> --}}
                </div>
            </div>
        </div>
    </div><!--row-->
</div>    




@endsection
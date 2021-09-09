@extends('layouts.admin')

@section('content')


<div class="container">
    <div class="row px-2">    
                <div class="card col-12 px-0 mb-2">
                    <div class="card-header">サイト外観</div>
    
                    <div class="card-body">
             

                        <form action="{{ route('headimgupload') }}" method="POST" enctype="multipart/form-data">
                            <p> 画像は横960px縦480pxJPGにしてください。</p>
                            @csrf
                            <div class="form-group col-12 px-0">
                                <label for="ヘッダー画像1">ヘッダー画像1</label>
                                <input type="file" class="form-control-file" id="headpicture1" name="file1">
                            </div>
                            <div class="form-group col-12 px-0">
                                <label for="ヘッダー画像2">ヘッダー画像2</label>
                                <input type="file" class="form-control-file" id="headpicture2" name="file2">
                            </div>
                            <div class="form-group col-12 px-0">
                                <label for="ヘッダー画像2">ヘッダー画像3</label>
                                <input type="file" class="form-control-file" id="headpicture3" name="file3">
                            </div>
                            <button type="submit" class="btn btn-primary col-4">登録</button>
                        </form>

                    </div>
                </div>
                <div class="card col-12 px-0 mb-2">    
                    <div class="card-header">ビルダー登録及び削除</div>
                    <div class="card-body">
                        <form action="{{ route('addbuilder') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-0">
                                {{-- <label for="formGroupItemBuilderInput"></label> --}}
                                <input type="email" class="form-control" id="formGroupItemBuilderInput" placeholder="ビルダーメールアドレス" name="buildermail" required>
                                <input type="text" class="form-control" id="formGroupItemBuilderInput" placeholder="ビルダー名" name="buildername" required>
                            </div>
                            <button type="submit" class="btn btn-primary col-4">ビルダー登録</button>
                        </form><br>


                        <form action="{{ route('deletebuilder') }}" method="POST">                        
                            @csrf
                            @method('delete')
                            <select class="" name="buildername">
                                <option value="0">---選択されていません--</option>
                                @foreach ($builders as $item)
                                <option name="buildername">{{$item->name}}</option>                                    
                                @endforeach
                            </select><br>
                            <button type="submit" class="btn btn-danger col-4">ビルダー削除</button>
                        </form><br>
                        <a href="/admin/poyopoyopage/builderlist">ビルダー一覧</a>
                    </div>

                </div>

                <div class="card col-12 px-0">    
                    <div class="card-header">カテゴリー登録及び削除</div>
                    <div class="card-body">
                        <form action="{{ route('addcategory') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-0">
                                {{-- <label for="formGroupItemcategoryInput"></label> --}}
                                <input type="text" class="form-control" id="formGroupItemcategoryInput" placeholder="カテゴリー名" name="categoryname">
                            </div>
                            <button type="submit" class="btn btn-primary col-4">カテゴリー登録</button>
                        </form><br>
                        <form action="{{ route('deletecategory') }}" method="POST">                        
                            @csrf
                            @method('delete')
                            <select class="" name="categoryname">
                                <option value="0">---選択されていません--</option>
                                @foreach ($categories as $category)
                                <option name="categoryname">{{$category->name}}</option>                                    
                                @endforeach
                            </select><br>
                            <button type="submit" class="btn btn-danger col-4">カテゴリー削除</button>
                        </form>
                    </div>

                </div>         

    </div>    
</div></div>



@endsection
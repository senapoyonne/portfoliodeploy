@extends('layouts.admin')

@section('content')


<div class="container">
    <div class="row">
        <div class="card col-12 px-0">
            <div class="card-header">既存の記事を編集する</div>

                <div class="card-body">        
                <form method="post" action="{!! url('/admin/poyopoyopage/eventmanage/edit/'.$data->id.='/patch') !!}" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="商品画像1">記事画像1(サイズは170px 130px)</label>
                        <input type="file" class="form-control-file" id="itempicture1" name="eventpic">
                    </div> --}}

                    <div class="form-group">
                        <label for="formGroupArticleTitleleInput">タイトル</label>
                        <input type="text" class="form-control" id="formGroupArticleTitleleInput" placeholder="記事タイトル" name="title" value="{{$data->info_title}}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupArticleCategoryInput">カテゴリ</label>
                        <input type="text" class="form-control" id="formGroupArticleCategoryInput" placeholder="カテゴリ" name="category" value="{{$data->info_category}}">
                    </div>

                    <div class="form-group">
                        <label for="ArticleDescription">記事本文</label>
                        <textarea class="form-control" id="ArticleDescription" rows="30" col="80" name="description">
{{-- <div class="blog-post">
          
    <p class="blog-post-meta">2014/01/01 by <a href="#">太郎</a></p>
    <h2 class="blog-post-title">サンプルタイトル</h2>
    <p></p>
                        
    <hr><!--  <hr>で枠線 --> --}}
    {{$data->info_detailtext}}
{{-- </div> --}}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary col-12">登録</button>
                </form>
                </div>
            </div>
        </div><!--card--->

    </div> <!--row--->
</div> <!--container--->



@endsection
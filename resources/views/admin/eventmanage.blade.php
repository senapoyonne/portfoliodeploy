@extends('layouts.admin')

@section('content')


<div class="container">
    <div class="row">
        <div class="card col-12 px-0 mb-4">
            <div class="card-header">新規記事登録</div>

                <div class="card-body">        
                <form method="post" action="{{ route('infoupload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="商品画像1">記事画像1(サイズは120px 120px)</label>
                        <input type="file" class="form-control-file" id="itempicture1" name="eventpic">
                    </div>

                    <div class="form-group">
                        <label for="formGroupArticleTitleleInput">タイトル</label>
                        <input type="text" class="form-control" id="formGroupArticleTitleleInput" placeholder="記事タイトル" name="title">
                    </div>
                    <div class="form-group">
                        <label for="formGroupArticleCategoryInput">カテゴリ</label>
                        <input type="text" class="form-control" id="formGroupArticleCategoryInput" placeholder="カテゴリ" name="category">
                    </div>

                    <div class="form-group">
                        <label for="ArticleDescription">記事本文</label>
                        <textarea class="form-control" id="ArticleDescription" rows="30" col="80" name="description">
{{-- <div class="blog-post">
          
    <p class="blog-post-meta">2014/01/01 by <a href="#">太郎</a></p>
    <h2 class="blog-post-title">サンプルタイトル</h2>
    <p></p>
                        
    <hr><!--  <hr>で枠線 --> --}}
    <p></p>
    <p></p>          
    <p></p>
                                    
    <h2>見出し</h2>
    <p></p>

    <h3>サブの見出し</h3>
    <p></p>

    <h3>サブの見出し</h3>
    <p></p>
    <ul>            
        <li></li>           
        <li></li>            
        <li></li>
    </ul>          
    <p></p>
{{-- </div> --}}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary col-12">登録</button>
                </form>
                </div>
            </div>
        </div><!--card--->
        <div class="row">
            <div class="card col-12 px-0">    
                    <div class="card-header">既存記事の管理</div>
                <div class="card-body">
                    {{-- <ul class="list-group list-group"> --}}
                        
                        {{-- <li class="list-group-item">
                            <div>
                               <span> {{$info->info_title}}</span><a href="{{ url('/') }}" class="py-6 btn btn-primary btn-sm active" role="button" aria-pressed="true">この記事を編集　</a>
                            </div>
                        </li> --}}

                        <table class="table table-hover">
                            <tbody>
                            @foreach($infos as $info)
                            @php
                                $id=$info->id;
                            @endphp
                              <tr>
                                <td colspan="3">
                                    <a href="{!! url('/info/'.$id) !!}"><span pr-4> {{$info->info_title}}</span>
                                </td>
                                <td colspan="1" style="width:10%;height:5%;">
                                    {{-- <form style="width:100%;height:100%;">
                                        <button href="{!! url('/admin/poyopoyopage/eventmanage/edit/'.$id) !!}" style="width:100%;height:100%;" class=" btn btn-primary btn-sm active" role="button" aria-pressed="true">編集　</button>
                                    </form> --}}
                                    <td colspan="1" style="width:10%;height:5%;">
                                        <form style="width:100%;height:100%;" ><button onclick='location.href="{!! url('/admin/poyopoyopage/eventmanage/edit/'.$id) !!}"' type="button" class="btn btn-primary">編集</button></form>
    
                                        {{-- <div class="text-right">
                                            <a href="{!! url('/admin/poyopoyopage/eventmanage/delete/'.$id) !!}" class=" btn btn-danger btn-sm active" role="button" aria-pressed="true">この記事を削除　</a>
                                         </div> --}}
                                    </td>  
                                </td>
                                <td colspan="1" style="width:10%;height:5%;">
                                    <form style="width:100%;height:100%;" method="POST" action="{!! url('/admin/poyopoyopage/eventmanage/delete/'.$id) !!}">@method('delete')@csrf<button type="submit" class="btn btn-danger">削除</button></form>

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
    </div> <!--row--->
</div> <!--container--->



@endsection
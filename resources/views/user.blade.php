@extends('layouts.app')

@section('content')
@section('title', '会員情報')


<div class="container">
    <div class="row">
    <button onclick='location.href="{{ route('useritemfav')}}"'  type="button" class="btn btn-warning mb-4 col-12">お気に入りした商品一覧を見る</button>
                <div class="card col-12 px-0 mb-4">
                    <div class="card-header">ユーザー情報</div>
                    <div class="card-body">
                        <table class="table table-bordered">

                            <tbody>
                            <tr>
                                <th scope="row">ユーザー名</th>
                                <td colspan="2">{{$auths->name}}</td>                   
                            </tr>
                            <tr>
                                <th scope="row">メールアドレス</th>
                                <td colspan="2">{{$auths->email}}</td>                                              
                            </tr>
                            <tr>
                                <th scope="row">郵便番号</th>
                                <td colspan="2">{{$auths->zipcode}}</td>                                              
                            </tr>
                            <tr>
                                <th scope="row">都道府県・市区町村・番地</th>
                                <td colspan="2">{{$auths->address1}}</td>                                              
                            </tr>
                            <tr>
                                <th scope="row">建物名・号室</th>
                                <td colspan="2">{{$auths->address2}}</td>                                              
                            </tr>
                            </tbody>
                        </table>
                        <button onclick='location.href="{{ route('password.form')}}"'  type="button" class="btn btn-danger mb-4 col-12">パスワードを変更する</button>
                    </div>
                </div><!--card-->  
                <div class="card col-12 px-0 mb-4">  
                        <div class="card-header">ユーザー情報の編集</div>
                        <div class="card-body h-adr">
                            <form method="post" action="{{ url('/user/patch') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupItemTitleleInput">お名前を変更 </label>
                                    <input type="name" class="form-control" id="formGroupItemTitleleInput" name="username" value="{{$auths->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupItemCategoryInput">メールアドレスを変更</label>
                                    <input type="email" class="form-control" id="formGroupItemCategoryInput" name="useremail" value="{{$auths->email}}">
                                </div>
                                <span class="p-country-name" style="display:none;">Japan</span>
                                <div class="form-group">
                                    <label for="formGroupItemBuilderInput">郵便番号(入力すると住所が自動入力されます)</label>
                                    <input type="text" class="form-control p-postal-code" id="formGroupItemBuilderInput"  name="postalcode" value="{{$auths->zipcode}}">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupItemvalueInput">都道府県・市区町村・番地</label>
                                    <input type="text" class="form-control p-region p-locality p-street-address p-extended-address" id="formGroupItemvalueInput" value="{{$auths->address1}}" name="address1"  >
                                </div>
                                <div class="form-group">
                                    <label for="ItemDescription">建物名・号室</label>
                                    <input class="form-control" id="ItemDescription" rows="3" name="address2" value="{{$auths->address2}}"></input>
                                </div>

                                <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>

                                <button type="submit" class="btn btn-primary col-12">変更を登録</button>
                            </form>
                        </div><!-- card body -->
                </div>         
    </div><!--row-->
</div>  <!--container-->  




@endsection
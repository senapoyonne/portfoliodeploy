@extends('layouts.admin')

@section('content')
@php
$id=$user->id;
@endphp

<div class="container">
    <div class="row">
                <div class="card col-12 px-0 mb-4">
                     <div class="card-header bg-danger text-white">{{$user->name}}のユーザー情報　※個人情報につき取り扱い注意※</div>
                    <div class="card-body">
                        <table class="table table-bordered">

                            <tbody>
                            <tr>
                                <th scope="row">ユーザー名</th>
                                <td colspan="2">{{$user->name}}</td>                   
                            </tr>
                            <tr>
                                <th scope="row">メールアドレス</th>
                                <td colspan="2">{{$user->email}}</td>                                              
                            </tr>
                            <tr>
                                <th scope="row">郵便番号</th>
                                <td colspan="2">{{$user->zipcode}}</td>                                              
                            </tr>
                            <tr>
                                <th scope="row">都道府県・市区町村・番地</th>
                                <td colspan="2">{{$user->address1}}</td>                                              
                            </tr>
                            <tr>
                                <th scope="row">建物名・号室</th>
                                <td colspan="2">{{$user->address2}}</td>                                              
                            </tr>
                            </tbody>
                        </table>
                        <!-- <button onclick='location.href="{{ route('password.form')}}"'  type="button" class="btn btn-danger mb-4 col-12">パスワードを変更する</button> -->
                    </div>
                </div><!--card-->  
                <div class="card col-12 px-0 mb-4">  
                        <div class="card-header">ユーザー情報の編集</div>
                        <div class="card-body h-adr">
                            <form method="post" action="{{ url('/admin/poyopoyopage/userdatabase/edit/'.$id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupItemTitleleInput">お名前を変更 </label>
                                    <input type="name" class="form-control" id="formGroupItemTitleleInput" name="username" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupItemCategoryInput">メールアドレスを変更</label>
                                    <input type="email" class="form-control" id="formGroupItemCategoryInput" name="useremail" value="{{$user->email}}">
                                </div>
                                <span class="p-country-name" style="display:none;">Japan</span>
                                <div class="form-group">
                                    <label for="formGroupItemBuilderInput">郵便番号(入力すると住所が自動入力されます)</label>
                                    <input type="text" class="form-control p-postal-code" id="formGroupItemBuilderInput"  name="postalcode" value="{{$user->zipcode}}">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupItemvalueInput">都道府県・市区町村・番地</label>
                                    <input type="text" class="form-control p-region p-locality p-street-address p-extended-address" id="formGroupItemvalueInput" value="{{$user->address1}}" name="address1"  >
                                </div>
                                <div class="form-group">
                                    <label for="ItemDescription">建物名・号室</label>
                                    <input class="form-control" id="ItemDescription" rows="3" name="address2" value="{{$user->address2}}"></input>
                                </div>

                                <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>

                                <button type="submit" class="btn btn-primary col-12">変更を登録</button>
                            </form>
                        </div><!-- card body -->
                </div>         
    </div><!--row-->
</div>  <!--container-->  




@endsection
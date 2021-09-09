@extends('layouts.app')

@section('content')
@section('title', '配送先の選択')


<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">トップ</a></li>
            <li class="breadcrumb-item"><a href="{{url('/cart')}}">カート</a></li>
            <li class="breadcrumb-item active" aria-current="page">配送先の選択</li>
        </ol>
    </nav>

    <div class="row p-1">
                @if ($auths->zipcode !== null)
                <div class="card col-12 px-0 mb-4">
                     <div class="card-header">現在設定されている配送先</div>
                    <div class="card-body">
                        <table class="table table-bordered">

                            <tbody>
                            <tr>
                                <th scope="row">宛名</th>
                                <td colspan="2">{{$auths->name}}</td>                   
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
                        <form method="post" action="{{ url('/cart/cashier/confirm') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- <span>支払方法を選択</span><br>
                        <input type="radio" id="card" name="hyouka" value="card" checked="checked"><label for="card">クレジットカード決済</label>
                        <input type="radio" id="banktransfer" name="hyouka" value="banktransfer"><label for="banktransfer">銀行振込</label>
                         -->
                        <button  type="submit" class="btn btn-primary mb-4 col-12">配送先を決定する</button>
                        </form>
                    </div>
                </div><!--card-->  
                @endif
                <div class="card col-12 px-0 mb-4">  
                        <div class="card-header"> 
                                @if ($auths->zipcode == null)
                                    {{ __('配送先の入力') }}
                                @else
                                別の住所に送る
                                @endif
                        </div>
                        <div class="card-body h-adr">
                            <form method="post" action="{{ url('/cart/cashier/confirm') }}" enctype="multipart/form-data">
                                @csrf
                                <span class="p-country-name" style="display:none;">Japan</span>
                                <div class="form-group">
                                    <label for="formGroupItemTitleleInput">宛名を変更</label>
                                    <input type="name" class="form-control" id="formGroupItemTitleleInput" name="username" value="{{$auths->name}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupItemBuilderInput">郵便番号(入力すると住所が自動入力されます)</label>
                                    <input type="text" class="form-control p-postal-code" id="formGroupItemBuilderInput"  name="postalcode" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupItemvalueInput">都道府県・市区町村・番地</label>
                                    <input type="text" class="form-control p-region p-locality p-street-address p-extended-address" id="formGroupItemvalueInput" value="" name="address1" required>
                                </div>
                                <div class="form-group">
                                    <label for="ItemDescription">建物名・号室</label>
                                    <input class="form-control" id="ItemDescription" rows="3" name="address2" required></input>
                                </div>

                                <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
                                <!-- <div class="h-adr">
                                <form>
                                @csrf
                                <span class="p-country-name" style="display:none;">Japan</span>
                                〒<input type="text" class="p-postal-code" size="8" maxlength="8"><br>
                                <input type="text" class="p-region"/><br>
                                <input type="text" class="p-region p-locality p-street-address p-extended-address"/></input>
                                </form>
                                </div> -->
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" >

                                <label class="form-check-label" for="remember">
                                
                                    {{ __('この住所を配送先として登録する') }}
                                
                                </label>
                                <p></p>
                                </div>
                                
                                <button type="submit" class="btn btn-primary col-12">配送先を決定する</button>
                            </form>
                        </div><!-- card body -->
                </div>         
    </div><!--row-->
</div>  <!--container-->  




@endsection
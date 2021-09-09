@extends('layouts.app')

@section('content')
@section('title', 'ご注文の確認')


<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">トップ</a></li>
            <li class="breadcrumb-item"><a href="{{url('/cart')}}">カート</a></li>
            <li class="breadcrumb-item"><a href="{{url('/cart/cashier')}}">配送先の選択</a></li>
            <li class="breadcrumb-item active" aria-current="page">注文内容・決済手段の確認</li>
        </ol>
    </nav>

    <div class="row p-1">
                <div class="card col-12 px-0 mb-4">
                     <div class="card-header">注文内容の確認</div>
                    <div class="card-body">
                        <table class="table table-bordered mb-4">

                            <tbody>
                            <thead>
                            <tr>
                                <th scope="row"　colspan="2">配送先住所</th>                                                   
                            </tr>
                            </thead>
                            <tr>
                                <th scope="row">宛名</th>
                                <td colspan="2">{{$shippingname}}</td>                   
                            </tr>
                            <tr>
                                <th scope="row">郵便番号</th>
                                <td colspan="2">{{$shippingzipcode}}</td>                                              
                            </tr>
                            <tr>
                                <th scope="row">都道府県・市区町村・番地</th>
                                <td colspan="2">{{$shippingaddress1}}</td>                                              
                            </tr>
                            <tr>
                                <th scope="row">建物名・号室</th>
                                <td colspan="2">{{$shippingaddress2}}</td>                                              
                            </tr>
                            <!-- <tr>
                                <th scope="row">ご請求額</th>
                                <td colspan="2">¥{{$totalpay}}</td>                                              
                            </tr> -->
                            </tbody>
                        </table>

                <table class="table table-bordered mb-4">
                
                <tbody>
                        <thead>
                            <tr>
                                <th scope="row"　colspan="4">ご注文の商品</th>                                                   
                            </tr>
                        </thead>
                    @foreach ($carts as $item)
                        @php
                            $id= $item->rowId; 
                            $pageid= $item->id;   
                        @endphp
                        
                        <tr>
                            <th scope="row" class="">
                                <img class="itemcartpic" src="../../storage/{{$item->options->product_imgpath1}}" alt="item image cap">
                            </th>
                            <td class="align-middle">
                                {{$item->name}}
                            </td>
                            <td class="align-middle">{{$item->qty}}個</td>
                            
                            
                            <td class="align-middle">¥{{$item->price}}(税込み)</td>
                                                           
                        </tr>
                        
                    @endforeach
                        <tr>
                                <th scope="row" colspan="3">ご請求額</th>
                                <td >¥{{$totalpay}}(税込み)</td>                                              
                        </tr>                    
                </tbody>            
                    
            </table>

                <form action="{{ route('paymentpage') }}" method="POST" class="form-group" >
                @csrf
                <!-- <p>決済方法を選択</p>
                <p>
                <label><input type="radio" name="payment" value="banktransfer" checked="checked">銀行振込</label>
                <label><input type="radio" name="payment" value="card">クレジットカード決済</label>
                </p>
                <p> -->
                <button type="submit" class="btn btn-primary">決済に進む</button>
                <p class="py-1"><a href="javascript:history.back();">前のページへ戻る</a></p>
                </form>
                                
                    </div>
                </div><!--card-->         
    </div><!--row-->
</div>  <!--container-->  



@endsection
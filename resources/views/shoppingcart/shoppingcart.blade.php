@extends('layouts.app')

@section('content')
@section('title', 'カート')

<div class="container">

        <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">トップ</a></li>
            <li class="breadcrumb-item active" aria-current="page">ショッピングカート</li>
         </ol>
        </nav>
    <div class="row">
        @if ($subtotalpay == 0 )    
        <div class="col-md-12 col-12">
            <div style="padding-top: 110px; padding-bottom: 100px;" class="col-12 nothing-in-cart text-center text-muted">
                <h5 class="py-10 mb-8">カートに商品は入っていません。</h5>
                <div style="padding-top: 16px;"><a href="{{ url('/') }}" class="py-6 btn btn-primary btn-lg active" role="button" aria-pressed="true">　　　買い物を続ける　　　</a></div>
            </div>
        </div>
        @endif 
        
        <div class="row col-md-8 col-12 mx-auto">
            <table class="table tableborderless mb-4 ">
                
                <tbody>
                    @foreach ($carts as $item)
                    @php
                        $id= $item->rowId; 
                        $pageid= $item->id;   
                    @endphp
                        
                        <tr>
                            <th scope="row" class="">
                                <a href="{!! url('/item/'.$pageid) !!}"><img class="itemcartpic" src="../storage/{{$item->options->product_imgpath1}}" alt="item image cap"></a>
                            </th>
                            <td class="align-middle">
                                <a href="{!! url('/item/'.$pageid) !!}">{{$item->name}}</a>
                            </td>
                            <td class="align-middle">¥{{$item->price}}(税込み)</td>
                            
                            
                            <td class="align-middle">{{$item->qty}}</td>
                            
                            <td class="align-middle">
                                <div class=""><form style="width:100%;height:100%;" method="post" action="{!! url('/cart/delete/'.$id) !!}">@method('delete')@csrf<button type="submit" class="btn-sm btn-danger">削除</button></form></div>
                            </td>                                 
                        </tr>
                        

                        <!-- <tr class="d-none d-md-block" >
                            <th scope="row">
                                <img class="itemcartpic" src="../storage/{{$item->options->product_imgpath1}}" alt="item image cap">
                            </th>
                            <td class="align-middle">
                                {{$item->name}}<br>{{$item->options->product_builder}}
                            </td>
                            <td class="align-middle">¥{{$item->price}}(税込み)</td>
                            
                            
                            <td class="align-middle">{{$item->qty}}</td>
                            
                            <td class="align-middle">
                                <div class=""><form style="width:100%;height:100%;" method="post" action="{!! url('/cart/delete/'.$id) !!}">@method('delete')@csrf<button type="submit" class="btn btn-danger">削除</button></form></div>
                            </td>                                 
                        </tr> -->
                        @endforeach                    
                </tbody>            
                    
            </table>
                
        </div>
            
            @if($subtotalpay >0 )
            <div class="row col-md-4 col-12 d-flex flex-column mx-auto" >
                <div><dl class="d-flex mb-0"><dt class="text-left flex-row">小計(税込価格)</dt><dd class="ml-auto">¥{{$subtotalpay}}</dd></dl></div>
                <div><dl class="d-flex mb-0"><dt class="text-left flex-row">送料</dt><dd class="ml-auto">¥1,000</dd></dl></div>
                <div><dl class="d-flex mb-0"><dt class="text-left flex-row">合計</dt><dd class="ml-auto">¥{{$totalpay}}</dd></dl></div>
                <div class="d-flex flex-column mb-2"><a href="{{ url('/cart/cashier') }}"  class=" text-center py-6 btn btn-primary btn-lg active " role="button" aria-pressed="true">レジに進む</a></div>
                <div class="d-flex flex-column"><a href="{{ url('/') }}"  class=" text-center py-6"  aria-pressed="true">買い物を続ける</a></div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

@extends('layouts.admin')

@section('content')


<div class="container">
<div class="row">
            <div class="card col-12 px-0">    
                    <div class="card-header">最新の購入履歴</div>
                <div class="card-body">
                    
                        <p class="px-4 mb-0">検索して会員を管理</p>
                    <form class="col-12 form-inline mt-2 mt-md-0 mb-4" method="POST" action="{!! route('adminitemhistorysearch') !!}"> 
                        @csrf               
                        <input class="col-12 form-control mr-sm-2" type="text" placeholder="名前、メールで検索" aria-label="Search" name="keyword"  value="">
                        <button class="col-12 btn btn-outline-success my-2 my-sm-0" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </form>
    
                        <table class="table table-hover">
                            <tbody>
                            
                                @foreach($histories as $history)
                                @php
                                $id=$history->id;
                                @endphp
                            <tr>
                                    <td colspan="3" class="py-3">
                                        <span pr-4>{{$history->product_name}}(製品単価:{{$history->product_price}}円)</span>
                                        <ui id="collapse{{$id}}" class="collapse list-group-flush" aria-labelledby="headingOne" data-parent="#accordionBrand">
                                            <li class="card-body list-group py-1">
                                            <span>【発送先】<br>{{$history->customer_addredss}}</span>
                                            </li>
                                            <li class="card-body list-group py-1">
                                            <span>【email】<br>{{$history->customer_email}}</span>
                                            </li>
                                            <li class="card-body list-group py-1">
                                            <span><br>【一緒に発注された他の商品】
                                            <br>------------------------
                                            <br>{{$history->fullhistory}}
                                            <br>------------------------
                                            </span>
                                            <span>合計支払額：{{$history->fullhistory_totalpay}}円</span>
                                            </li>
                                            
                                        </ui>
                                    </td>

                                    <td colspan="3" class="py-4">
                                        <span pr-4>{{$history->subtotalpay}}円</span>
                                    </td>

                                    <td colspan="3" class="py-4">
                                        <span pr-4>{{$history->product_qty}}個</span>
                                        <ui id="collapseone" class="collapse list-group-flush" aria-labelledby="headingOne" data-parent="#accordionBrand">
                                            <!-- <li class="card-body list-group">
                                            <a href="{!! url('/search/') !!}">3個</a>
                                            </li>
                                            <li class="card-body list-group">
                                            <a href="{!! url('/search/') !!}">46個</a>
                                            </li>
                                            <li class="card-body list-group">
                                            <a href="{!! url('/search/') !!}">合計</a>
                                            </li> -->
                                        </ui>                                        
                                    </td>

                                    <td colspan="3" class="py-4">
                                        <span pr-4>山田太郎　様</span>
                                        <!-- <ui id="collapseone" class="collapse list-group-flush" aria-labelledby="headingOne" data-parent="#accordionBrand">
                                            <li class="card-body list-group">
                                            <a href="{!! url('/search/') !!}">¥12000</a>
                                            </li>
                                            <li class="card-body list-group">
                                            <a href="{!! url('/search/') !!}">¥4600</a>
                                            </li>
                                            <li class="card-body list-group">
                                            <a href="{!! url('/search/') !!}">¥4600</a>
                                            </li>
                                        </ui> -->
                                    </td>

                                    <td colspan="3" class="py-4">
                                        <span pr-4>{{$history->created_at}}</span>
                                    </td>

                                    <td colspan="1" style="width:15%;height:5%;">
                                        <div class="px-0 py-1 col-12 accordion text-center" id="accordionBrand">
                                            <div class="card">
                                                <div class="card-header px-0 py-0" id="headingOne">
                                                <a  data-toggle="collapse" data-target="#collapse{{$id}}">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse.$id" aria-expanded="true" aria-controls="collapseOne">
                                                            詳細
                                                        </button>
                                                    </h5>
                                                </a>
                                                </div>

                                            </div>
                                        </div>    
                                    </td>  
                                                                 
                            </tr>
                                @endforeach

                                <!-- <tr>
                                    <td colspan="3" class="py-3">
                                        <span pr-4>ダウズスイマーKLT(製品単価:4500円)</span>
                                        <ui id="collapseone" class="collapse list-group-flush" aria-labelledby="headingOne" data-parent="#accordionBrand">
                                            <li class="card-body list-group py-1">
                                            <span>【発送先】<br>615-0032 京都府京都市右京区西院西高田町 333</span>
                                            </li>
                                            <li class="card-body list-group py-1">
                                            <span>【email】<br>aaabbbccccdd@gmail.com</span>
                                            </li>
                                            <li class="card-body list-group py-1">
                                            <span><br>【一緒に発注された他の商品】
                                            <br>------------------------
                                            <br>300item(1個)<br>test1(1個)<br>300item2(3個)
                                            <br>------------------------
                                            </span>
                                            <span>合計支払額：7000円</span>
                                            </li>
                                            
                                        </ui>
                                    </td>

                                    <td colspan="3" class="py-4">
                                        <span pr-4>13500円</span>
                                    </td>

                                    <td colspan="3" class="py-4">
                                        <span pr-4>3個</span>
                                        <ui id="collapseone" class="collapse list-group-flush" aria-labelledby="headingOne" data-parent="#accordionBrand">

                                        </ui>                                        
                                    </td>
                                    <td colspan="3" class="py-4">
                                        <span pr-4>山田太郎　様</span>

                                    </td>
                                    <td colspan="3" class="py-4">
                                        <span pr-4>2021/4/21/12:00</span>
                                    </td>

                                    <td colspan="1" style="width:15%;height:5%;">
                                        <div class="px-0 py-1 col-12 accordion text-center" id="accordionBrand">
                                            <div class="card">
                                                <div class="card-header px-0 py-0" id="headingOne">
                                                <a  data-toggle="collapse" data-target="#collapseone">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseOne">
                                                            詳細
                                                        </button>
                                                    </h5>
                                                </a>
                                                </div>

                                            </div>
                                        </div>    
                                    </td>  
                                                                 
                                </tr> -->                              
                            </tbody>
                        </table>
    
                        {{ $histories->links() }}  
                </div>
            </div>
</div>  
</div>



@endsection
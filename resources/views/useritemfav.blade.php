@extends('layouts.app')

@section('content')
@section('title', 'お気に入り商品一覧')


<div class="container">
<div class="card col-12 px-0">    
                    <div class="card-header">お気に入りした商品の一覧</div>
                <div class="card-body">
        <div class="row col-md-8 col-12 mx-auto">
            <table class="table tableborderless mb-4 ">
                
                <tbody>
                    @foreach ($items as $item)
                    @php
                         
                        $pageid= $item["product_id"];   
                    @endphp
                        
                        <tr>
                            <th scope="row" class="">
                                <a href="{!! url('/item/'.$pageid) !!}"><img class="itemcartpic" src="../storage/{{$item["product_imgpath1"]}}" alt="item image cap"></a>
                            </th>
                            <td class="align-middle">
                                <a href="{!! url('/item/'.$pageid) !!}">{{$item["product_name"]}}</a>
                            </td>
                            <td class="align-middle">¥{{$item["product_price"]}}(税込み)</td>
                            
                            
                            <!-- <td class="align-middle">{{$item["product_price"]}}</td> -->
                                                            
                        </tr>
                        

                        @endforeach                    
                </tbody>            
                    
            </table>
                
        </div>
        </div>
        </div>
        </div>

</div>  <!--container-->  




@endsection
@extends('layouts.app')


@section('content')
@php
$id=$data->product_id;    
$categoryname = $data->product_category;
$buildername = $data->product_builder;
@endphp
@section('title')
{{$data->product_name}}@endsection
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">トップ</a></li>
            <li class="breadcrumb-item"><a href="{!! url('/search/'.$buildername) !!}">{{$data->product_builder}}</a></li>
            <li class="breadcrumb-item"><a href="{!! url('/search/'.$categoryname) !!}">{{$data->product_category}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">商品詳細</li>
        </ol>
    </nav>

<div class="row">
<!--------商品カルーセル---------->
    <div class="col-md-6 d-none d-sm-block mb-2">
        <div id="carousel-1" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    @if(!is_null($data->product_imgpath2))<li data-target="#carousel-1" data-slide-to="1"></li>@endif
                    @if(!is_null($data->product_imgpath3))<li data-target="#carousel-1" data-slide-to="2"></li>@endif
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../storage/{{$data->product_imgpath1}}" alt="First slide">
                    </div>
                    @if(!is_null($data->product_imgpath2))
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../storage/{{$data->product_imgpath2}}" alt="Second slide">
                    </div>
                    @endif
                    @if(!is_null($data->product_imgpath3))
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../storage/{{$data->product_imgpath3}}" alt="Third slide">
                    </div>
                    @endif
                </div>
                    <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
        </div>
    </div>

    <div class="col-md-12 d-block d-sm-none mb-2">
        <div id="carousel-2" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
                    @if(!is_null($data->product_imgpath2))<li data-target="#carousel-2" data-slide-to="1"></li>@endif
                    @if(!is_null($data->product_imgpath3))<li data-target="#carousel-2" data-slide-to="2"></li>@endif
                </ol>
                <div class="carousel-inner Itempic">
                    <div class="carousel-item active">
                        <img class="d-block w-100 h-100" src="../storage/{{$data->product_imgpath1}}" alt="First slide">
                    </div>
                    @if(!is_null($data->product_imgpath2))
                    <div class="carousel-item">
                        <img class="d-block w-100 h-100" src="../storage/{{$data->product_imgpath2}}" alt="Second slide">
                    </div>
                    @endif
                    @if(!is_null($data->product_imgpath3))
                    <div class="carousel-item">
                        <img class="d-block w-100 h-100" src="../storage/{{$data->product_imgpath3}}" alt="Third slide">
                    </div>
                    @endif
                </div>
                    <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
        </div>
    </div>
<!--------商品カルーセル---------->

<!--------商品の説明---------->

    <div class="col-md-6 col-12">

        <h1 class="d-none d-md-block">{{$data->product_name}}</h1>
        <h3 class="d-block d-md-none mt-1">{{$data->product_name}}</h3>
        <h1 class="text-success d-none d-md-block">¥ {{$data->product_price}}<span class="small text-dark">(税込)</span></h1>
        <h1 class="text-success d-block d-md-none mt-1">¥ {{$data->product_price}}</h1>
        <h5><span class="small text-muted">ブランド:</span><a href="{!! url('/search/'.$buildername) !!}">{{$data->product_builder}}</a></h5>

        <form class="py-2" method="POST" action="{!! url('/item/'.$id) !!}">
            @csrf
            <span class="mb-2">個数: </span><input class="mb-1" type="number" name="quantity" min="1" max="{{$data->product_stock}}" value="1"><span>在庫 : のこり{{$data->product_stock}}個</span><br>
            @if($data->product_stock > 0)
            <button type="submit" class="btn btn-primary btn-lg">カートに追加する</button>
            @endif
            @if($data->product_stock <= 0)
            <button type="submit" class="btn btn-primary btn-lg" disabled>カートに追加する</button>
            <span>※只今在庫切れ</span>
            @endif
            {{-- <select class="form-select" aria-label="Default select example">
            <option selected>カラーを選択してください</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select> --}}
        </form>

        @if($fav== 0)
        <form method="POST" action="{!! url('/item/fav/'.$id) !!}">
        @csrf
        <button  type="submit" class=" btn btn-warning mb-4 " >
        商品をお気に入りに追加</button>
        </form>
        @endif

        @if($fav==1)
        <form method="POST" action="{!! url('/item/unfav/'.$id) !!}">
        @csrf
        <button  type="submit" class=" btn btn-warning mb-4 " >
        商品をお気に入りから削除</button>
        </form>
        @endif

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">商品について</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">商品の詳細</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
              </li> -->
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                {{-- <p class="py-2">商品について語る欄ばばばばばばばばｂばばばばばばばばばばばばばばばばばばばばばばばば<br>商品について語るということは其れすなわち語るということである。
                    <div class="row col-9 text-center">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/78JqDka8gj8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <br>このように動画とかを貼ってもいいと思う。
                </p> --}}
                {{$data->product_description}}
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table table-bordered">

                    <tbody>
                      <tr>
                        <th scope="row">商品名</th>
                        <td colspan="2">{{$data->product_name}}</td>                   
                      </tr>
                      <tr>
                        <th scope="row">メーカー</th>
                        <td colspan="2">{{$data->product_builder}}</td>                                              
                      </tr>
                      <tr>
                        <th scope="row">重さ</th>
                        <td colspan="2">{{$data->product_weight}}</td>                                              
                      </tr>
                      <tr>
                        <th scope="row">サイズ</th>
                        <td colspan="2">{{$data->product_size}}</td>                                              
                      </tr>
                    </tbody>
                </table>

              </div>
              
            </div>
    </div>
<!--------商品の説明---------->

<!--------関連商品---------->
</div>
</div>
@endsection

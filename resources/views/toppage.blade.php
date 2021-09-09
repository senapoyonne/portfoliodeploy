@extends('layouts.app')

@section('title', 'トップ')
@section('content')


<div class="container">
<!---------------------カルーセル------------------>
        <div id="carousel-1" class="carousel slide py-2">
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner Headslider">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('storage/headimg/headimg1.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('storage/headimg/headimg2.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('storage/headimg/headimg3.jpg') }}" alt="Third slide">
                </div>
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
<!--------------------スマホ用ゾーン------------------>
        <div class="mb-2 d-block d-md-none">
                <div class="px-0 py-1 col-12 accordion text-center" id="accordionBrand">
                    <div class="card">
                        <div class="card-header px-0 py-0" id="headingOne">
                        <a  data-toggle="collapse" data-target="#collapseone">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseOne">
                                ブランド一覧
                            </button>
                        </h5>
                        </a>
                        </div>

                        <ui id="collapseone" class="collapse list-group-flush" aria-labelledby="headingOne" data-parent="#accordionBrand">
                            @foreach ($builders as $builder)
                            @php
                            $buildername = $builder->name;
                            @endphp
                            <li class="card-body list-group">
                            <a href="{!! url('/search/'.$buildername) !!}">{{$builder->name}}</a>
                            </li>
                            @endforeach
                            <li class="card-body list-group">
                                ルアーブランド
                            </li>
                        </ui>
                    </div>
                </div>

                <div class="px-0 py-1 col-12 accordion text-center" id="accordionCategory">
                    <div class="card">
                        <div class="card-header px-0 py-0" id="headingOne">
                        <a data-toggle="collapse" data-target="#collapseTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                カテゴリ一覧
                            </button>
                        </h5>
                        </a>
                        </div>

                        <ui id="collapseTwo" class="collapse list-group-flush" aria-labelledby="headingOne" data-parent="#accordionCategory">
                            @foreach ($categories as $category)
                            @php
                            $categoryname = $category->name;
                            @endphp
                            <li class="card-body list-group">
                            <a href="{!! url('/search/'.$categoryname) !!}">{{$category->name}}</a>
                            </li>
                            @endforeach
                            <li class="card-body list-group">
                                カテゴリ
                            </li>
                        </ui>
                    </div>
                </div>

                <form class="col-12 form-inline mt-2 mt-md-0" method="POST" action="{!! route('search') !!}"> 
                @csrf               
                    <input style=" font-size:16px; " class="form-control mr-sm-2" type="text" placeholder="商品名やブランド名で検索" aria-label="Search" name="keyword"  value="">
                    <button class="col-12 btn btn-outline-success my-2 my-sm-0" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
        </div>
<!--------------------カテゴリブランドPC------------------>

        <div class="row py-2">
                <div class="col-md-3 col-lg-2  d-none d-md-block">    <!-- 12分割中3を割り当て -->

                            <h6 class="headunderline px-2 py-2 mb-0">ブランド一覧</h6>
                                <ul class="list-group list-group-flush shadow-sm mb-2 text-left" >
                                    @foreach ($builders as $builder)
                                    @php
                                    $buildername = $builder->name;
                                    @endphp
                                    <li class="list-group-item px-2 py-3 border-bottom-0">
                                     <a href="{!! url('/search/'.$buildername) !!}" class="border-left border-secondary border-3"><span class="px-2">{{$builder->name}}</span></a>
                                    </li>
                                    @endforeach
                                    {{-- <li class="list-group-item px-2 py-3 border-bottom-0">
                                     <a href="#" class="border-left border-secondary border-3"><span class="px-2">ルアーブランド</span></a>
                                    </li>
                                    <li class="list-group-item px-2 py-3 border-bottom-0">
                                     <a href="#" class="border-left border-secondary border-3"><span class="px-2">ルアーブランド</span></a>
                                    </li>
                                    <li class="list-group-item px-2 py-3 border-bottom-0">
                                     <a href="#" class="border-left border-secondary border-3"><span class="px-2">ルアーブランド</span></a>
                                    </li>
                                    <li class="list-group-item px-2 py-3 border-bottom-0">
                                     <a href="#" class="border-left border-secondary border-3"><span class="px-2">ルアーブランド</span></a>
                                    </li>
                                    <li class="list-group-item px-2 py-3 border-bottom-0">
                                     <a href="#" class="border-left border-secondary border-3"><span class="px-2">ルアーブランド</span></a>
                                    </li> --}}
                                </ul>
                            <h6 class="headunderline px-2 py-2 mb-0">カテゴリ一覧</h6>
                                <ul class="list-group list-group-flush shadow-sm mb-0 text-left" >
                                    <li class="list-group-item px-2 py-3 border-bottom-0">
                                     <a href="#" class="border-left border-secondary border-3"><span class="px-2">ルアーブランド</span></a>
                                    </li>
                                    @foreach ($categories as $category)
                                    @php
                                    $categoryname = $category->name;
                                    @endphp
                                    <li class="list-group-item px-2 py-3 border-bottom-0">
                                     <a href="{!! url('/search/'.$categoryname) !!}" class="border-left border-secondary border-3"><span class="px-2">{{$category->name}}</span></a>
                                    </li>
                                    @endforeach
                                </ul>
			    </div>

<!--------------------商品カード------------------>
                <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">    <!-- 12分割中9を割り当て -->
                        <h4 class="headunderline">新着商品</h4>
                    <div class="row mb-2">  <!-- グリッドの中にrowクラスのdivを追加（入れ子構造） -->
                        
                        @foreach ($items as $item)
                        @php
                        $itemid = $item->product_id;
                        $buildername =$item->product_builder;
                        @endphp
                        <div class="col-6 col-md-4 col-lg-4 mb-2">
                            <div class="card shadow-sm ">
                                                <a href="{!! url('/item/'.$itemid) !!}"><img class="card-img-top" src="storage/{{$item->product_imgpath1}}" alt="Card image cap"></a>
                                <div class="card-body">
                                                <a href="{!! url('/item/'.$itemid) !!}"><span class="card-title">{{$item->product_name}}<br></span></a>
                                                <a href="{!! url('/search/'.$buildername) !!}"><span class="card-subtitle text-muted">{{$item->product_builder}}<br></span></a>
                                                <span class="card-subtitle text-muted">¥ {{$item->product_price}} @if($item->product_stock < 1)<span class="text-danger">(在庫切れ)</span> @endif<br></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="px-4 py-2 col-12">
                        <a href="/viewall" class="btn btn-outline-secondary col-12" role="button">もっと商品を探す</a>
                        </div>
                        <!-- <div class="col-6 col-md-4 col-lg-4 mb-2">
                            <div class="card shadow-sm ">
                                                <a href="#"><img class="card-img-top" src="{{asset('img/rure1.jpg')}}" alt="Card image cap"></a>
                                <div class="card-body">
                                                <a href="#"><span class="card-title">ダウズスイマー220SF<br></span></a>
                                                <a href="#"><span class="card-subtitle text-muted">HLTルアー<br></span></a>
                                                <span class="card-subtitle text-muted">¥ 3200<br></span>
                                </div>
                            </div>
                        </div> -->

                </div>
<!--------------------お知らせ------------------>
            <h5 class="headunderline">お知らせ・イベント</h5>
                    <div class="container-fluid row mx-0 px-0 small">    
                        @foreach ($events as $event)
                        @php
                        $id=$event->id;
                        @endphp
                        <div class="col-12 col-md-12 col-lg-6 px-0">
                            <div class="card h-30 flex-md-row mb-2 box-shadow h-md-250 px-0">
                                <div class="card-body d-flex flex-column align-items-start">
                                    
                                    <div class="mb-2 text-muted">{{$event->created_at->format('Y/m/d')}}</div>
                                    <a href="{!! url('/info/'.$id) !!}"><h6 class="card-title mb-2">{{$event->info_title}}</h6></a>
                                    <strong class="d-inline-block mb-1 text-primary"><a href="#">{{$event->info_category}}</a></strong>
                                
                                </div>
                                <img class="eventpic card-img-right flex-auto d-none d-md-block h-100" src="storage/eventpic/{{$event->info_imgpath1}}" alt="Card image cap">
                            </div>
                        </div>
                            
                        @endforeach


                        <!-- <div class="col-12 col-md-12 col-lg-6 px-0">
                            <div class="card h-30 flex-md-row mb-2 box-shadow h-md-250 px-0">
                                <div class="card-body d-flex flex-column align-items-start">
                                    
                                    <div class="mb-2 text-muted">2021/12/23</div>
                                    <h6 class="card-title mb-2">お知らせをここに書いていきますコが更新されました
                                    </h6>
                                    <strong class="d-inline-block mb-1 text-primary"><a href="#">お知らせ</a></strong>
                                
                                </div>
                                <img class="eventpic card-img-right flex-auto d-none d-md-block h-100" src="{{asset('img/rure1.jpg')}}" alt="Card image cap">
                            </div>
                        </div> -->

                    </div>
                </div>
	    </div>
</div>




@endsection

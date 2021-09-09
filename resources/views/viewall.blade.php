@extends('layouts.app')

@section('content')
@section('title')
すべての商品:@endsection
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">トップ</a></li>
            <li class="breadcrumb-item"><a href="#"></a>すべての商品</li>

        </ol>
    </nav>


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
                    <input class="form-control mr-sm-2" type="text" placeholder="商品名やブランド名で検索" aria-label="Search" name="keyword"  value="">
                    <button class="col-12 btn btn-outline-success my-2 my-sm-0" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
        </div>
<!--------------------カテゴリブランドPC------------------>

        <div class="row py-4">
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
                        <h4 class="headunderline">すべての商品:</h4>
                    <div class="row small mb-4">  <!-- グリッドの中にrowクラスのdivを追加（入れ子構造） -->
                        
                        @foreach ($items as $item)
                        @php
                        $itemid = $item->product_id;
                        @endphp
                        <div class="col-6 col-md-4 col-lg-4 mb-2">
                            <div class="card shadow-sm ">
                                                <a href="{!! url('/item/'.$itemid) !!}"><img class="card-img-top" src="{{ asset('storage/' .$item->product_imgpath1) }}" alt="Card image cap"></a>
                                <div class="card-body">
                                                <a href="{!! url('/item/'.$itemid) !!}"><span class="card-title">{{$item->product_name}}<br></span></a>
                                                <a href="#"><span class="card-subtitle text-muted">{{$item->product_builder}}<br></span></a>
                                                <span class="card-subtitle text-muted">¥ {{$item->product_price}}<br></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
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

                <div class="d-flex justify-content-center">{{ $items->links() }}</div>
                    
    </div>
</div>    


@endsection
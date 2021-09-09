@extends('layouts.app')

@section('title', 'イベント、お知らせ')
@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">トップ</a></li>
            <li class="breadcrumb-item active" aria-current="page">イベント|お知らせ</li>
        </ol>
    </nav>

    <div class="row">
<!--------メイン---------->
<main role="main" class="container px-4">
    <div class="row">
      <div class="col-md-9 blog-main">

  
        <div class="blog-post">
          
            <p class="blog-post-meta">{{$event->created_at->format('Y/m/d')}}</p>
            <h2 class="blog-post-title">{{$event->info_title}}</h2>
            <p></p>
            @php                
            echo $event->info_detailtext;
            @endphp

        </div>
  

  
      </div><!-- /.blog-main -->
  
      <aside class="col-md-3 blog-sidebar">

  
        <!-- <div class="p-3">
         
          <h4 class="font-italic">アーカイブ</h4>

          <ol class="list-unstyled mb-0">
            <li><a href="#">2014/03</a></li>
            <li><a href="#">2014/02</a></li>
            <li><a href="#">2014/01</a></li>
            <li><a href="#">2013/12</a></li>
            <li><a href="#">2013/11</a></li>
            <li><a href="#">2013/10</a></li>
            <li><a href="#">2013/09</a></li>
            <li><a href="#">2013/08</a></li>
            <li><a href="#">2013/07</a></li>
            <li><a href="#">2013/06</a></li>
            <li><a href="#">2013/05</a></li>
            <li><a href="#">2013/04</a></li>
          </ol>
        </div> -->
  
        <div class="p-3">
          
          <h4 class="font-italic">SNS</h4>
          <ol class="list-unstyled">
            <li><a href="#"></a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
          </ol>
        </div>
      </aside><!-- /.blog-sidebar -->
  
    </div><!-- /.row -->
  
  </main><!-- /.container -->



<!--------サイド---------->
</div>
</div>
@endsection

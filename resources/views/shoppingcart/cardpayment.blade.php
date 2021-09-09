
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ご注文の決済 | {{ config('app.name') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">

  <div class="row py-4">

      @if(!is_null($user->stripe_id))
  <div class="card col-12 px-0 ">
      <div class="card-header mb-1">カード情報の入力</div>
      <form action="{{route('paymentform')}}" class="card-form"  id="form_defaultcard" method="POST">
      @csrf
      <h4 class="px-4 mb-1 mt-1">ご登録のカードを使う</h4>
      <p class="px-4 mb-1">{{$defaultCard['brand']}} {{$defaultCard['number']}}<br>有効期限 {{$defaultCard['exp_month']}}月/{{$defaultCard['exp_year']}}年</p>
                          <div class="form-group px-4 mb-1">
                              <label for="usedefaultcard">決済にこのカードを使う</label>
                              <input type="checkbox" name="usedefaultcard" id="usedefaultcard" required>
                          </div>
                          <div class="form-group px-4">
                              <button type="submit" id="form_defaultcard" class="btn btn-primary">決済</button>
                          </div>
      </form>
      </div>

      @endif                          
    <div class="card col-12 px-0 mt-2">
      <div class="card-header mb-1">カード情報の入力</div>
                        <form action="{{route('paymentform')}}" class="card-form"  id="form_payment" method="POST">
                          @csrf

                          
                          <h4 class="px-4 mt-1">新しいカードを使う</h4>
                          <div class="form-group px-4 mb-1">
                              <label for="cardNumber">カード番号</label>
                              <div class="form-control" id="cardNumber"></div>
                          </div>

                          <div class=" px-4 mb-1">
                              <label for="securityCode">セキュリティコード</label>
                              <div class="form-control" id="securityCode"></div>
                          </div>

                          <div class="form-group px-4 mb-1">
                              <label for="expiration">有効期限</label>
                              <div class="form-control" id="expiration"></div>
                          </div>

                          <div class="form-group px-4 mb-3">
                              <label for="name">カード名義</label>
                              <input type="text" name="cardName" id="cardName" class="form-control" value="" placeholder="カード名義を入力">
                          </div>

                          
                          <div class="form-group px-4 mb-2">
                              <label for="cardremember">カード情報の保存</label>
                              <input type="checkbox" name="remember" id="cardremember" class="mt-2">
                          </div>
   
                          <div class="form-group px-4 ">
                              <button type="submit" id="form_payment" class="btn btn-primary">決済</button>
                          </div>

                        </form>
                        <p class="px-4"><a href="javascript:history.back();">前のページへ戻る</a></p>
    </div>      
  </div><!--row-->         
</div><!--container-->  



</body>

<script type="application/javascript" src="https://js.stripe.com/v3/"> </script>
<script type="application/javascript" src="{{ asset('js/payment22.js') }}"></script>
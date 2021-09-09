<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>"{{ config('app.name', 'Laravel') }}"</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
</head>

<header>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/admin/poyopoyopage') }}">
                            管理画面TOP
                        </a>


                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">
                                    
                                </ul>
                            <!-- Left Side Of Navbar -->
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <li><a class="navbar-brand" href="{{ url('/admin/poyopoyopage/saleshistory') }}">販売履歴</a></li>
                                <li><a class="navbar-brand" href="{{ url('/admin/poyopoyopage/itemdatabase') }}">データベース(商品)</a></li>
                                <li><a class="navbar-brand" href="{{ url('/admin/poyopoyopage/userdatabase') }}">データベース(会員)</a></li>
                                <li><a class="navbar-brand" href="{{ url('/admin/poyopoyopage/itemmanage') }}">商品管理</a></li>
                                <li><a class="navbar-brand" href="{{ url('/admin/poyopoyopage/eventmanage') }}">お知らせ投稿</a></li>
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('会員登録') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                                    <li class="nav-item">
 
                                    </li>
                                    <li class="d-none d-md-inline ml-2">

                                    </li>
                            </ul>
                        </div>
                    </div>
            </nav>
</header>
<body style="padding-top: 40px;">
    <div id="app">
        <main class="py-4 ">
                    @yield('content')
        </main>
    </div>
</body>

    <footer>
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <span class="logo">ROCOMADE</span>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="menu">
                        <span>Menu</span>
                            <li>
                                <a href="{{ url('/') }}">トップ</a>
                            </li>

                            <li>
                                <a href="#">ROCOMADEについて</a>
                            </li>

                            <li>
                                <a href="#">ブログ</a>
                            </li>
                    </ul>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="address">
                        <span>Contact</span>
                        <!-- <li>
                        <i class="fa fa-phone" aria-hidden="true"></i> <a href="#">Phone</a>
                        </li> -->
                        <!-- <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#">Adress</a>
                        </li> -->
                        <li>
                            <a href="#">Email</a>
                        </li>
                        <li>
                            <a href="#">Twitter</a>
                        </li>
                        <li>
                            <a href="#">Instagram</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>

</html>

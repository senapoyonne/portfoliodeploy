<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

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

                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>

                            <a href="{{ url('/cart') }}">
                        <span class="mb-2 d-block d-md-none" data-toggle="collapse" data-target="#shoppingcart" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                </svg>
                        </span>
                            </a>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">

                                </ul>
                            <!-- Left Side Of Navbar -->
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">

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
                                                {{ __('ログアウト') }}
                                            </a>
                                            <a class="dropdown-item" href="/user">会員情報</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                                    <li class="nav-item">
                                        <form class="form-inline mt-2 mt-md-0" method="POST" action="{!! route('search') !!}">
                                        @csrf
                                        <input style=" font-size:16px; " class="form-control mr-sm-2" type="text" placeholder="商品名やブランド名で検索" aria-label="Search" name="keyword"  value="">
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </li>
                                    <li class="d-none d-md-inline ml-2">
                                        <span class="mb-2	" type="button" data-toggle="collapse" data-target="#shoppingcart" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                            <a href="{{ url('/cart') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                                </svg>
                                            </a>
                                        </span>
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
                                <a href="{{ url('/aboutus') }}">ROCOMADEについて</a>
                            </li>

                            <li>
                                <a href="https://rocomadebuilders.com/">ブログ</a>
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

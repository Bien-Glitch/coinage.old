{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html> --}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Coinage') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('design/flickity/flickity.pkgd.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('design/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('design/assets/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/custom/main.css')}}">

    <!-- Flickity slider-->
    <link rel="stylesheet" href="{{asset('design/flickity/flickity.css')}}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <a href="/" class="navbar-brand"><img src="{{asset('design/img/logo.svg')}}" alt="" srcset="" height="50px"
                width="100px"></a>

        <button class="navbar-toggler" data-target="#nav-collapse" data-toggle="collapse" aria-controls="nav-collapse"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav-collapse" class="collapse navbar-collapse">
            <div class="d-lg-flex flex-fill justify-content-center align-items-center order-lg-1">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="/">HOME</a>
                    </li>
                    <li class="nav-item {{ Request::is('about') ? 'active' : '' }}"><a class="nav-link"
                            href="/about">ABOUT</a></li>
                    <li class="nav-item "><a class="nav-link" href="#">CONTACT</a></li>
                </ul>
            </div>

            <div class="d-lg-flex flex-grow-1 justify-content-start align-items-center order-lg-0 mb-5 mb-lg-0">
                <div class="dropdown buy-options mx-md-2 mb-2 mb-md-0">
                    <a type="button" class="btn btn-sm btn-purple w-100" style="border:none;" data-toggle="dropdown">
                        <span class="mx-2">BUY</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu" style="z-index: 2000">
                        <a class="dropdown-item" href="#">Text</a>
                    </div>
                </div>

                <div class="dropdown buy-options mx-md-2 mb-2 mb-md-0">
                    <a type="button" class="btn btn-sm btn-outline-purple w-100" data-toggle="dropdown">
                        <span class="mx-2">SELL</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu" style="z-index: 2000">
                        <a class="dropdown-item" href="#">Text</a>
                    </div>
                </div>
            </div>

            @guest
            <div class="d-lg-flex flex-fill justify-content-end align-items-center order-lg-2">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('login') ? 'active' : '' }} mx-md-2 mb-2 mb-md-0">
                        <a class="btn btn-sm btn-purple rounded-pill px-4 w-100" style="border:none;" href="/login">Login</a>
                    </li>
                    <li class="nav-item {{ Request::is('register') ? 'active' : '' }} mx-md-2 mb-2 mb-md-0">
                        <a class="btn btn-sm btn-outline-purple rounded-pill px-4 w-100" href="/register">Create
                            Account</a>
                    </li>
                </ul>
            </div>
            @else
            <div class="d-lg-flex flex-fill justify-content-end align-items-center order-lg-2">
                <ul class="navbar-nav">
                    <li class="nav-item mx-md-2 mb-2 mb-md-0">
                        <a class="btn btn-sm btn-purple rounded-pill px-4 w-100" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
            @endguest
        </div>
    </nav>

    <main class="py-1">
        @yield('content')
    </main>

    <!-- Site footer -->
    <footer class="site-footer footer">
        <div class="container-fluid">
            <div class="d-flex mb-3">
                <img src="./design/img/logo.svg" alt="" class="mr-3">
                <img src="./design/img/download-app-1.png" alt="" style="width:110px;" class="mr-3">
                <img src="./design/img/download-app-2.png" alt="" style="width:110px;" class="mr-3">
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 pl-5">
                    <h6>About</h6>
                    <p class="text-justify w-90">
                        Coinage is a leading peer-to-peer crypto trading platform where you can safely trade with
                        millions of users, using multiple payment methods.</p>
                </div>

                <div class="col-xs-6 col-md-2">
                    <h6>Categories</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
                        <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
                        <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
                        <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
                        <li><a href="http://scanfcode.com/category/android/">Android</a></li>
                        <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-2">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                        @guest
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Login</a></li>
                        @endguest
                    </ul>
                </div>

                <div class="col-xs-6 col-md-2">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                        @guest
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Login</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
                        <a href="#">Scanfcode</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="./design/js/jquery/jquery.min.js"></script>
    <script src="./design/js/jquery/jquery.form.js"></script>
    <script src="./design/js/popper/popper.js"></script>
    <script src="./design/js/bootstrap/bootstrap.js"></script>

</body>

</html>

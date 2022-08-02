<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <!-- Theme CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>

    <style>
        .sidebar-brand-wrapper a:hover,
        .sidebar-brand-wrapper a:visited,
        .sidebar-brand-wrapper a:link,
        .sidebar-brand-wrapper a:active {
            color: #ffffff;
            text-decoration: none;
        }
    </style>
    {{-- <script src="{{ asset('js/webcam.js') }}"></script>
    <script src="{{ asset('js/dataset.js') }}"></script> --}}
    @yield('additionalHead')

</head>

<body class="bg-dark">
    <div id="app" class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo no_deco text-light" href="/" data-tag="title">
                    {!! trans('home.title') !!}</a>
                <a class="sidebar-brand brand-logo-mini no_deco text-light" href="/"
                    data-tag="mini-title">{!! trans('home.miniTitle') !!}</a>
            </div>
            <ul class="nav">
                <li class="nav-item nav-category">
                    <span class="nav-link text-light">{!! trans('home.navigation') !!}</span>
                </li>

                @Auth
                    <li class="nav-item menu-items    {{ url()->current() == route('home') ? 'active' : '' }}">
                        <a class="nav-link" href="/home">
                            <span class="menu-icon">
                                <i class="mdi mdi-bullseye-arrow"></i>
                            </span>
                            <span class="menu-title text-light ">{!! trans('home.train') !!} </span>
                        </a>
                    </li>
                @endauth
                <li class="nav-item menu-items  {{ url()->current() == route('user') ? 'active' : '' }}">
                    <a class="nav-link" href="/user">
                        <span class="menu-icon">
                            <i class="mdi mdi-home"></i>
                        </span>
                        <span class="menu-title">User</span>
                    </a>
                </li>
            </ul>
        </nav>
        <main class="container-fluid page-body-wrapper">
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                            alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler text-light align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name" data-tag="lang">
                                        {!! trans('home.lang') !!}
                                    </p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0" data-tag="language">{!! trans('home.language') !!}</h6>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-item preview-item">
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">EN</p>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="/lang/id" class="dropdown-item preview-item">
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">ID</p>
                                    </div>
                                </a>
                            </div>
                        </li>
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
                                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                    <div class="navbar-profile">
                                        <img class="img-xs rounded-circle border" src="{{ asset('ava.png') }}"
                                            alt="">
                                        <p class="mb-0 d-none d-sm-block navbar-profile-name"> {{ Auth::user()->name }}
                                        </p>
                                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                    aria-labelledby="profileDropdown">
                                    <h6 class="p-3 mb-0"> {!! trans('home.profile') !!}</h6>
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-logout text-danger"></i>
                                            </div>
                                        </div>


                                        <p class="preview-subject mb-1 ml-2"> {{ __('home.logout') }}</p>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </li>

                        @endguest
                    </ul>

                </div>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }} "></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script src="{{ asset('js/index.js') }}"></script> --}}
    @yield('additionalScript')

</body>

</html>

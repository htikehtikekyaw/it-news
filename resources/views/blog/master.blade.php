<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',\App\Base::$name)</title>
    <link rel="icon" href="{{ asset('images/logos/fav.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Anonymous+Pro:wght@400;700&family=Lato:ital,wght@0,400;1,100;1,300&family=Montserrat:ital,wght@0,100;0,200;0,500;0,600;1,300;1,600&family=PT+Sans:ital,wght@0,400;0,700;1,400&family=Padauk:wght@400;700&family=Spline+Sans+Mono:wght@500;600&family=Ubuntu:ital,wght@0,400;1,300;1,500&family=Whisper&display=swap" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    @yield('head')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom position-fixed top-0 w-100">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('images/logos/logo.png') }}" style="height: 40px" class="me-1" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="feather-align-right"></i>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
            <ul id="menu-top-right-menu" class="navbar-nav ms-auto mb-2 mb-md-0 ">
                <li id="menu-item-12"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-12">
                    <a href="{{ route('index') }}" class="nav-link {{ request()->url() == route('index') ? 'active' : '' }}">Home</a>
                </li>
                <li id="menu-item-16"
                    class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-16"><a
                        href="{{ route('about') }}" class="nav-link {{ request()->url() == route('about') ? 'active' : '' }}">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center vh-100 pt-5">
        <div class="col-12 col-lg-6 pt-5">
            @yield('content')
        </div>
        <div class="col-12 col-lg-4 border-start pt-5" id="sidebarColumn">
            <div class="position-sticky" style="top: 100px">
                <div class="mb-5 sidebar">
                    <div id="search" class="mb-5">
                        <form action="{{ route('index') }}" method="get">
                            <div class="d-flex search-box">
                                <input type="search" class="form-control" name="search" value="{{ request()->search }}" placeholder="search for anything" required>
                                <button class="btn btn-outline-parimary">Search</button>
                            </div>
                        </form>
                    </div>
                    <div id="category mb-5">
                        <h4 class="fw-bolder">Category Lists</h4>
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <a href="{{ route('baseOnCategory',$category->id) }}" class="{{ request()->url() == route('baseOnCategory',$category->id) ? 'active' : '' }}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @yield('paginatin-place')
                </div>
                <div class="d-none d-lg-block">
                </div>
            </div>
        </div>

        <div class="col-12 border-bottom mb-0 mt-3">
        </div>
        <div class="col-12">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center my-1">
                    <div class="text-center">
                        Copyright © 2021 IT News
                    </div>
                    <a href="#themeHeaderSpacer" class="btn btn-primary">
                        <i class="feather-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="{{ asset('js/theme.js') }}"></script>


</body>
</html>

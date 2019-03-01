<!DOCTYPE html>
<html>
<head>
    <base href="{{ asset('bower_components/frontend') }}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('frontend.shop') }} - @yield('title')</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="cssfrontend/frontend.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="cssfrontend/searchajax.js"></script>
</head>
<style>
</style>
<body>
    <!-- header -->
    <div id="header" class="row menu-area headroom header--fixed">
        <div id="menu_data" class="col-xs-6 col-sm-6 col-md-3 text-align">
         <ul class="menu_data">
            <li>@if (Auth::guard('loyal_customer')->check())
                <a href="{{ asset('user/logout') }}">{{ trans('frontend.logout') }}</a>
                <li><a href="{{ asset('user/order')}}">{{ trans('frontend.single') }}</a></li>
                @else
                <a href="{{ asset('user') }}">{{ trans('frontend.login') }}</a>
                <li><a href="#" title="{{ trans('frontend.noAccount') }}" onclick='return false'>{{ trans('frontend.single') }}</a></li>
                @endif
            </li>
            <li><a href="{{ asset('/device') }}">{{ trans('frontend.accessories') }}</a></li>
            <li><a href="{{ asset('/') }}">{{ trans('frontend.home') }}</a></li>
        </ul>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div id="search-bar" class="col-md-6 col-md-offset-2">
            <div class="box">
                <div class="container-1">
                    {!! Form::open(array('route' => 'search', 'method' => 'GET', 'class' => 'navbar-form', 'role' => 'search')) !!}
                    <span class="icon"><i class="fa fa-search"></i></span>
                    {!! Form::text('result', null, ['id' => 'search', 'class' => 'form-control', 'placeholder' => trans('frontend.search')]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div id="cart" class="col-md-3 col-md-offset-1 text-center">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a class="display" href="{{ asset('cart/show') }}">{{ trans('frontend.cart') }}</a>
            <a href="{{ asset('cart/show') }}">{{ Cart::getTotalQuantity() }}</a>
        </div>
    </div>
</div>
<!-- end header -->
<!-- wrap -->
@yield('main')
<!-- end wrap -->
<script type="text/javascript" src="../headroom/headroom.min.js"></script>
<script type="text/javascript" src="cssfrontend/fronend.js"></script>

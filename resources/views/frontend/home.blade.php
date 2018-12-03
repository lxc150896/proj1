@extends('frontend.master')
@section('title', trans('frontend.home'))
@section('main')
<div id="wrap-inner" class="col-md-9">
    <div class="row text-center" id="h-banner">
        <img src="img/home/h-banner2.jpg">
        <img src="img/home/h-banner2.jpg">
    </div>
    <div class="row list-product">
        <div class="col-md-12">
            <div class="clearfix"></div>
            <h3>{{ trans('frontend.special') }}</h3>
            @foreach($featured as $item)
            <div class=" hoverimg col-xs-6 col-xs-offset-3 col-sm-offset-0 col-md-offset-0 col-sm-6 col-md-3 text-center post">
                <a href="{{ asset('detail/'.$item->id.'/'.$item->slug.'.html') }}"><img src="{{ asset(config('constant.avatar') . $item->img) }}"></a>
                <p><a href="{{ asset('detail/'.$item->id.'/'.$item->slug.'.html') }}">{{ $item->name_product }}</a></p>
                <span>{{ number_format($item->price, 0, ',', '.') }} {{ trans('frontend.price') }}</span>
                {{-- <p><a href="#">{{ $item->name_product }}</a></p> --}}
                <div class=" hover col-xs-12 col-sm-12 col-md-12">
                </div>
            </div>
            @endforeach()
        </div>
    </div>
    <div class="row list-product">
        <div class="col-md-12">
            <div class="clearfix"></div>
            <h3>{{ trans('frontend.newProduct') }}</h3>
            @foreach($new_product as $item)
            <div class=" hoverimg col-xs-6 col-xs-offset-3 col-sm-offset-0 col-md-offset-0 col-sm-6 col-md-3 text-center post">
                <a href="{{ asset('detail/'.$item->id.'/'.$item->slug.'.html') }}"><img src="{{ asset(config('constant.avatar') . $item->img) }}"></a>
                <p><a href="{{ asset('detail/'.$item->id.'/'.$item->slug.'.html') }}">{{ $item->name_product }}</a></p>
                <span>{{ number_format($item->price, 0, ',', '.') }} {{ trans('frontend.price') }}</span>
                {{-- <p><a href="#">{{ $item->name_product }}</a></p> --}}
                <div class=" hover col-xs-12 col-sm-12 col-md-12">
                </div>
            </div>
            @endforeach()
        </div>
    </div>
</div>
@stop

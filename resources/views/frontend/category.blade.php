@extends('frontend.master')
@section('title', trans('frontend.listCategory'))
@section('main')
<link rel="stylesheet" href="css/category.css">
<div id="wrap-inner" class="col-md-9">
    <div class="row list-product">
        <div class="col-md-12">
            <div class="clearfix"></div>
            <h3>{{$categoryName->name }}</h3>
            @foreach($items as $item)
            <div class=" hoverimg col-xs-6 col-xs-offset-3 col-sm-offset-0 col-md-offset-0 col-sm-6 col-md-3 text-center post">
                <a href="{{ asset('detail/' . $item->id . '/' . $item->slug . '.html') }}"><img src="{{ asset(config('constant.avatar') . $item->img) }}"></a>
                <p><a href="{{ asset('detail/' . $item->id . '/' . $item->slug . '.html') }}">{{ $item->name_product }}</a></p>
                <span>{{ number_format($item->price, config('constant.zero'), ',', '.') }} {{ trans('frontend.price') }}</span>
                {{-- <p><a href="#">{{ $item->name_product }}</a></p> --}}
                <div class=" hover col-xs-12 col-sm-12 col-md-12">
                </div>
            </div>
            @endforeach()
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            {{ $items->links() }}
        </div>
    </div>
</div>
@stop

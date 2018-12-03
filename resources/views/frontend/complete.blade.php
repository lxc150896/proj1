@extends('frontend.master')
@section('title', trans('frontend.finish'))
@section('main')
<link rel="stylesheet" href="css/hoanthanh.css">
<div id="wrap-inner" class="col-md-9">
    <div class="col-md-12 hoanthanh">
        <div class="clearfix"></div>
        <p>{{ trans('frontend.notificationOne') }}</p>
        <p>{{ trans('frontend.notificationTwo') }}</p>
        <p>{{ trans('frontend.notificationThree') }}</p>
        <p>{{ trans('frontend.notificationFour') }}</p>
        <p>{{ trans('frontend.notificationFive') }}</p>
    </div>  
    <p class="text-right return"><a href="{{ asset('/') }}">{{ trans('frontend.back') }}</a></p>
</div>
@stop

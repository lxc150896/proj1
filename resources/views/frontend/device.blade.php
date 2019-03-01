@extends('frontend.order_master')
@section('title', trans('frontend.home'))
@section('main')
<link rel="stylesheet" href="cssfrontend/device.css">
<section class="homepage">
    <ul class="cate homeproduct">
        @foreach ($devices as $device)
        <li>
            <a href="/cap-dien-thoai/cap-lightning-12m-devia-aex">
                <img width="80" height="80" src="{{ ($device->image) ? $device->image : asset(config('constant.image') . 'logo-zmobile.jpg') }}">
                <strong>{{ $device->price }}</strong>
                <span>{{ $device->promotion}}</span>
                <label class="discountpercent">{{ $device->discountpercent }}</label>
                <h3>{{ $device->title }}</h3>

                <div class="shockpriceinfo col_1">
                    <span>
                        {{ trans('frontend.receive') }}
                    </span>
                </div>

            </a>
            <a href="/gio-hang?game=online-tiet-kiem&amp;productid=84848" class="botbtn">Mua ngay</a>
        </li>
        @endforeach
    </ul>
    <br>
</section>
@stop

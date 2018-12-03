@extends('frontend.master')
@section('title', trans('frontend.detail'))
@section('main')
<link rel="stylesheet" href="css/details.css">
<div id="wrap-inner" class="col-md-9">
    <div class="row list-product">
        <div class="col-md-12">
            <div class="clearfix"></div>
                <h3>{{ $item->name_product }}</h3>
            <div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
                <img src="{{ asset(config('constant.avatar') . $item->img) }}">
            </div>
            <div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
                <p>{{ trans('frontend.prices')}} <span class="price">{{ number_format($item->price, 0, ',', '.') }}</span></p>
                <p>{{ trans('frontend.guarantee') }} {{ $item->warranty }}</p> 
                <p>{{ trans('frontend.accessories') }} {{ $item->accessories }}</p>
                <p>{{ trans('frontend.condition') }} {{ $item->condition }}</p>
                <p>{{ trans('frontend.promotion') }} <span class="promotion">{{ $item->promotion }}</span></p>
                <p>{{ trans('frontend.status') }} @if($item->status == 1) {{ trans('frontend.stillProduct') }} @else {{ trans('frontend.effeteProduct') }} @endif</p>
                <p class="add-cart text-center"><a href="{{ asset('cart/add/' . $item->id) }}">{{ trans('frontend.buy') }}</a></p>
            </div>
        </div>
    </div>
    <div class="row list-product">
        <div class="col-md-12">
            <h3>{{ trans('frontend.configuration') }}</h3>
            <table>
                <tr>
                    <td>{{ trans('frontend.screen') }}</td>
                    <td>{{ $item->screen }}</td>
                </tr>
                <tr>
                    <td>{{ trans('frontend.operating') }}</td>
                    <td>{{ $item->operating }}</td>
                </tr>
                <tr>
                    <td>{{ trans('frontend.cameraAfter') }}</td>
                    <td>{{ $item->camera_after }}</td>
                </tr>
                <tr>
                    <td>{{ trans('frontend.CameraBefore') }}</td>
                    <td>{{ $item->camera_before }}</td>
                </tr>
                <tr>
                    <td>{{ trans('frontend.cpu') }}</td>
                    <td>{{ $item->cpu }}</td>
                </tr>
                <tr><td>{{ trans('frontend.ram') }}</td>
                    <td>{{ $item->ram }}</td>
                </tr>
                <tr>
                    <td>{{ trans('frontend.memory') }}</td>
                    <td>{{ $item->memory }}</td>
                </tr>
                <tr>
                    <td>{{ trans('frontend.memoryStick') }}</td>
                    <td>{{ $item->memory_stick }}</td>
                </tr>
                <tr>
                    <td>{{ trans('frontend.sim') }}</td>
                    <td>{{ $item->sim }}</td>
                </tr>
                <tr>
                    <td>{{ trans('frontend.battery') }}</td>
                    <td>{{ $item->battery_capacity }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row list-product">
        <div class="col-md-12">
            <div class="clearfix"></div>
            <h3>{{ trans('frontend.compare') }}</h3>
            @foreach($products as $product)
            <div class=" hoverimg col-xs-6 col-xs-offset-3 col-sm-offset-0 col-md-offset-0 col-sm-6 col-md-3 text-center post">
                <a href="{{ asset('detail/' . $product->id . '/' . $product->slug . '.html') }}"><img src="{{ asset(config('constant.avatar') . $product->img) }}"></a>
                <p><a href="{{ asset('detail/' . $product->id . '/'.$product->slug . '.html') }}">{{ $product->name_product }}</a></p>
                <span>{{ number_format($product->price, 0, ',', '.') }} {{ trans('frontend.price') }}</span>
                <p>{{ trans('frontend.screen') }} {{ $product->screen }}</p>
                <p>{{ trans('frontend.cameraAfter') }} {{ $product->camera_after }}</p>
                <p>{{ trans('frontend.batteryCcapacity') }} {{ $product->battery_capacity }}</p>
                <div class=" hover col-xs-12 col-sm-12 col-md-12">
                </div>
            </div>
            @endforeach()
        </div>
    </div>
    <div class="row list-product">
        <div class="col-md-12">
            <h3>{{ trans('frontend.detail') }}</h3>
            <p class="text-justify">{!! $item->description !!}</p>
        </div>
    </div>
    <div class="row list-product">
        <div class="col-md-12">
            <h3>{{ trans('frontend.comment') }}</h3>
            <div class="col-md-9 comment">
                {!! Form::open(array('method' => 'POST')) !!}
                    <div class="form-group">
                        <label for="email">{{ trans('frontend.email') }}</label>
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('frontend.name') }}</label>
                        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}                       
                    </div>
                    <div class="form-group">
                        <label for="cm">{{ trans('frontend.comment') }}</label>
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '10', 'required']) !!}
                    </div>
                    <div class="form-group text-right">
                        {!! Form::submit(trans('frontend.send'), ['class' => 'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="row list-product">
        <div class="col-md-12 comment-list">
            <div class="col-md-9 comment">
                @foreach($comments as $comment)
                <ul>
                    <li class="com-title">{{ $comment->name }}<br>
                        <span>{{ date('d/m/Y H:i', strtotime($comment->created_at)) }}</span>    
                    </li>
                    <li class="com-details">
                        {{ $comment->content }}
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop

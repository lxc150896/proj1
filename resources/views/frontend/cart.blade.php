@extends('frontend.master')
@section('title', trans('frontend.cart'))
@section('main')
<link rel="stylesheet" href="css/cart.css">
@include('frontend.js.cart')
@include('frontend.js.discount')
<div id="wrap-inner" class="col-md-9">
    {!! Form::open(array('route' => 'cart', 'method' => 'POST', 'id' => 'form2')) !!}
    <div class="row list-product">
        <div class="col-md-12">
            <div class="clearfix"></div>
            <h3>{{ trans('frontend.cart') }}</h3>
            <span class="khuyen">{{ trans('frontend.promotion') }}</span>
            @if(Cart::getTotalQuantity() >=  config('constant.one'))
            <table id="table_cart" class="table table-bordered .table-responsive text-center">
                <tr class="active">
                    <td class="tdimg">{{ trans('frontend.descriptiveImage') }}</td>
                    <td class="tdproduct">{{ trans('frontend.nameProduct') }}</td>
                    <td class="tdproduct">{{ trans('frontend.quality') }}</td>
                    <td class="tdprice">{{ trans('frontend.unitPice') }}</td>
                    @if (isset($check))
                    <td>{{ trans('frontend.point') }}</td>
                    @endif
                    <td class="tdprice">{{ trans('frontend.intoMoney') }}</td>
                    <td class="tdimg">{{ trans('frontend.delete') }}</td>
                </tr>
                @foreach($items as $item)
                <tr>
                    <td><img class="img-responsive" src="{{ asset(config('constant.avatar') . $item->attributes->img) }}"></td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <div class="form-group">
                            <input class="form-control" type="number" value="{{ $item->quantity }}" min="1" onchange="updateCart(this.value, '{{ $item->id }}')">
                        </div>
                    </td>
                    <td><span class="price">{{ number_format($item->price, config('constant.zero'), ',', '.') }} {{ trans('frontend.price') }}</span></td>
                    @if (isset($check))
                    @foreach($arrs as $arr)
                    <td><span class="price">{{ $arr->point }}</span></td>   
                    @endforeach
                    @endif
                    <td><span class="price">{{ number_format($item->price * $item->quantity, config('constant.zero'), ',', '.') }} {{ trans('frontend.price') }}</span></td>
                    <td><a href="{{ asset('cart/delete/' . $item->id) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
                </tr>
                @endforeach
            </table>
            <div class="row" id="total-price">
                <div class="col-md-12">
                    <table>
                        <tr>
                            <td>{{ trans('frontend.totalPayment') }}</td>
                            <td><span class="total-price">{{ number_format($total, config('constant.zero'), ',', '.') }} {{ trans('frontend.price') }}</span></td>
                        </tr>
                        @if (isset($check))
                        <tr>
                            <td>{{ trans('frontend.apply') }}
                                {!! Form::select('discount', array(
                                    config('constant.oneHundredThousand') => config('constant.zero'),
                                    config('constant.twoHundredThousand') => config('constant.oneHundredThousand'),
                                    config('constant.threeHundredThousand') => config('constant.twoHundredThousand'),
                                    config('constant.forHundredThousand') => config('constant.threeHundredThousand'),
                                    config('constant.fiveHundredThousand') => config('constant.forHundredThousand'),
                                    config('constant.sixHundredThousand') => config('constant.fiveHundredThousand'),
                                ), 's', ['id' => 'cantry']) 
                                !!}
                            </td>
                            <td id="promotion">{{ $total }} {{ trans('frontend.price') }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td><a href="{{ asset('/') }}" class="my-btn btn">{{ trans('frontend.buyNext') }}</a>
                                <a class="my-btn btn">{{ trans('frontend.update') }}</a>
                                <a href="{{ asset('cart/delete/all') }}" class="my-btn btn">{{ trans('frontend.deleteCart') }}</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row list-product">
            <div class="col-md-9">
                <h3>{{ trans('frontend.purchase') }}</h3>
                @if (isset($check))
                @foreach($arrs as $arr)
                <div class="form-group">
                    <label for="email">{{ trans('frontend.emailCustomer') }}</label>
                    {!! Form::email('email', $arr->email, ['class' => 'form-control', 'id' => 'email', 'required', 'readonly']) !!}
                    <!-- <p>{{ $arr->email }}</p> -->
                </div>
                <div class="form-group">
                    <label for="name">{{ trans('frontend.theirNames') }}</label>
                    {!! Form::text('name', $arr->name, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    <label for="phone">{{ trans('frontend.phoneUser') }}</label>
                    {!! Form::number('phone', $arr->phone, ['class' => 'form-control', 'id' => 'phone']) !!}
                </div>
                <div class="form-group">
                    <label for="add">{{ trans('frontend.address') }}</label>
                    {!! Form::text('add', $arr->address, ['class' => 'form-control', 'id' => 'add', 'required']) !!}
                </div>
                <div class="form-group">
                    <label for="add">{{ trans('frontend.request') }}</label>
                    {!! Form::textarea('note', null, ['class' => 'form-control', 'rows' => config('constant.ten'), 'id' => 'cm', 'required']) !!}
                </div>
                @endforeach
                @else
                <div class="form-group">
                    <label for="email">{{ trans('frontend.emailCustomer') }}</label>
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required']) !!}
                </div>
                <div class="form-group">
                    <label for="name">{{ trans('frontend.theirNames') }}</label>
                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    <label for="phone">{{ trans('frontend.phoneUser') }}</label>
                    {!! Form::number('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
                </div>
                <div class="form-group">
                    <label for="add">{{ trans('frontend.address') }}</label>
                    {!! Form::text('add', null, ['class' => 'form-control', 'id' => 'add', 'required']) !!}
                </div>
                <div class="form-group">
                    <label for="add">{{ trans('frontend.request') }}</label>
                    {!! Form::textarea('note', null, ['class' => 'form-control', 'rows' => '10', 'id' => 'cm', 'required']) !!}
                </div>
                @endif
                @else
                <h2><div class="alert alert-danger">{{ trans('frontend.note') }}</div><h2>
                    @endif
                </div>
            </div>
            {!! Form::submit(trans('frontend.orderFulfillment'), ['id' => 'discount', 'class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        @stop

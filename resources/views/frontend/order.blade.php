@extends('frontend.order_master')
@section('title', trans('frontend.home'))
@section('main')
@if ((isset($orders)) && (count($orders) > 0))
<div class="container">
<div class="col-sm-12">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ trans('remember.listOrder') }}</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div>
                                <div class="thongbao">
                                    @if (session('status'))
                                    <div class="alert alert-danger">{{ session('status') }}</div>
                                    @endif
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead class="thearch">
                                    <tr class="bg-primary">
                                        <th>{{ trans('remember.customerId') }}</th>
                                        <th>{{ trans('remember.customer') }}</th>
                                        <th>{{ trans('remember.customerPhone') }}</th>
                                        <th>{{ trans('remember.customerAddress') }}</th>
                                        <th>{{ trans('remember.customerDate') }}</th>
                                        <th>{{ trans('remember.information') }}</th>
                                        <th>{{ trans('remember.option') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ date('d/m/Y H:i', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->note }}</td> 
                                        <td>
                                            <a href="{{ asset('user/single/' . $order->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>{{ trans('remember.detail') }}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div><!--/.main-->
</div>
@else
<div class="text-center">
    <h2><div class="alert alert-danger">{{ trans('frontend.noteOrder') }}</div><h2>
</div>
@endif
@stop

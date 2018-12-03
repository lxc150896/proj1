@extends('backend.master')
@section('title', trans('remember.order'))
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
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
                                            <a href="{{ asset('admin/order/detail/' . $order->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>{{ trans('remember.detail') }}</a>                                        
                                            <a onclick="return confirm_delete()" href="{{ asset('admin/order/delete/' . $order->id) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>{{ trans('remember.delete') }}</a>
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
@stop

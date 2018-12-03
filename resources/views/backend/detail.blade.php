@extends('backend.master')
@section('title', trans('remember.listItems'))
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ trans('remember.listItems') }}</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div>
                                <div>
                                 <a class="btn btn-primary" href="{{ asset('admin/order') }}"><i>{{ trans('remember.back') }}</i></a>
                             </div>
                             <div class="thongbao">
                                @if (session('status'))
                                <div class="alert alert-danger">{{ session('status') }}</div>
                                @endif
                            </div>
                        </div>
                        @foreach ($orders as $order)
                        @endforeach
                        {{-- {{ $order->note }} --}}
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <table class="table table-bordered">
                                        <thead class="thearch">
                                            <tr class="bg-primary">
                                                <th>{{ trans('remember.customerId') }}</th>
                                                <th>{{ trans('remember.customer') }}</th>
                                                <th>{{ trans('remember.customerPhone') }}</th>
                                                <th>{{ trans('remember.customerAddress') }}</th>
                                                <th>{{ trans('remember.customerDate') }}</th>
                                                <th>{{ trans('remember.information') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="2">{{ $order->id }}</td>
                                                <td rowspan="2">{{ $order->name }}</td>
                                                <td rowspan="2">{{ $order->phone }}</td>
                                                <td rowspan="2">{{ $order->address }}</td>
                                                <td rowspan="2">{{ date('d/m/Y H:i', strtotime($order->created_at)) }}</td>
                                                <td rowspan="2">{{ $order->note }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td colspan="3">
                                    <table class="table table-bordered">
                                        <thead class="thearch">
                                            <tr class="bg-primary">
                                                <th>{{ trans('remember.productName') }}</th>
                                                <th>{{ trans('remember.quantity') }}</th>
                                                <th>{{ trans('remember.price') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->name_product }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ number_format($order->unit_price, 0, ',', '.') }} {{ trans('remember.vnd') }}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td>{{ trans('remember.total') }}</td>
                                                <td align="center" colspan="2">{{ number_format($order->total, 0, ',', '.') }} {{ trans('remember.vnd') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    @if ($order->status == config('constant.one'))
                                    {{ trans('remember.confirm') }}
                                    <a href="{{ asset('admin/order/status/' . $order->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>{{ trans('remember.orderConfirmation') }}</a>
                                    @elseif ($order->status == config('constant.two'))
                                    {{ trans('remember.confirmed') }}
                                    <a href="{{ asset('admin/order/status/' . $order->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>{{ trans('remember.shippingConfirmation') }}</a>
                                    @elseif ($order->status == config('constant.three'))
                                    {{ trans('remember.shipping') }}
                                    <a href="{{ asset('admin/order/status/' . $order->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>{{ trans('remember.confirmationReceived') }}</a>
                                    @else
                                    <i class="text-primary">{{ trans('remember.received') }}</i>
                                    @endif                          
                                </th>                                
                                <td align="right"><a href="" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>{{ trans('remember.edit') }}</a></td>
                            </tr>
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

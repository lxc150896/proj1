@extends('backend.master')
@section('title', trans('remember.Listproduct'))
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ trans('remember.Listproduct') }}</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div>
                                <a href="{{ asset('admin/product/add') }}" class="btn btn-primary">{{ trans('remember.Addproduct') }}</a>
                            <div class="thongbao">
                            @if (session('status'))
                            <div class="colo">{{ session('status') }}</div>
                            @endif
                            </div>
                            </div>
                            <table class="table table-bordered">
                                <thead class="thearch">
                                    <tr class="bg-primary">
                                        <th>{{ trans('remember.ID') }}</th>
                                        <th class="ten">{{ trans('remember.NameProduct') }}</th>
                                        <th>{{ trans('remember.Productprice') }}</th>
                                        <th class="anh">{{ trans('remember.Productimg') }}</th>
                                        <th>{{ trans('remember.Category') }}</th>
                                        <th class="option">{{ trans('remember.Option') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($product_list as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name_product }}</td>
                                        <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                                        <td>
                                            <img class="img" src="{{ asset(config('constant.avatar') . $product->img) }}">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <a href="{{ asset('admin/product/edit/' . $product->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>{{ trans('remember.edit') }}</a>
                                            <a onclick="return confirm('bạn có chắc chắn muốn xóa sản phẩm này')" href="{{ asset('admin/product/delete/' . $product->id) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>{{ trans('remember.delete') }}</a>
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

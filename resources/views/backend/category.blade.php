@extends('backend.master')
@section('title', trans('remember.Listcate'))
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('remember.Listcate') }}</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ trans('remember.Addcategory') }}
                        </div>
                        <div class="panel-body">
                            @include('errors.note')
                            {!! Form::open(array('route' => 'category', 'method' => 'POST')) !!}
                            <div class="form-group">
                                <label>{{ trans('remember.Namecate') }}</label>
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('remember.Namecate'), 'required']) !!}
                                {{-- <input type="text" name="name" class="form-control" placeholder="Tên danh mục..."> --}}
                            </div>
                            <div class="form-group">
                                {!! Form::submit(trans('remember.Addcategory'), ['class' => 'form-control btn btn-primary']) !!}
                                {{-- <input type="submit" name="submit" class="form-control btn btn-primary" value="Thêm danh mục"> --}}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
            </div>
            <div class="col-xs-12 col-md-7 col-lg-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('remember.Listcategory') }}</div>
                    @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                      <th>{{ trans('remember.Namecate') }}</th>
                                      <th class="cate_cach">{{ trans('remember.option') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categorylist as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ asset('admin/category/edit/' . $category->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>{{ trans('remember.edit') }}</a>
                                        <a onclick="return confirm( ' {{ __('frontend.delCate') }}')" href="{{ asset('admin/category/delete/' . $category->id) }}" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-trash">
                                            </span>{{ trans('remember.delete') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
@stop

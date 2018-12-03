@extends('backend.master')
@section('title', trans('remember.Addproduct'))
@section('main')
<link href="bower_components/backend/css/styles.css" rel="stylesheet">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">  
            <div class="panel panel-primary">
                <div class="panel-heading">{{ trans('remember.Addproduct') }}</div>
                <div class="panel-body">
                @include('errors.note')
                @if (session('status'))
                <div class="alert alert-danger">{{ session('status') }}</div>
                @endif
                    {!! Form::open(array('route' => 'addproduct', 'method' => 'POST', 'files' => true)) !!}
                        <div class="row" >
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>{{ trans('remember.NameProduct') }}</label>
                                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.Productprice') }}</label>
                                    {!! Form::number('price', null, ['class' => 'form-control', 'required', 'min' => '10']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.Productimg') }}</label>
                                    {!! Form::file('img', ['class' => 'form-control hidden', 'id' => 'img', 'required', 'onchange' => 'changeImg(this)']) !!}
                                    <img id="avatar" class="thumbnail" src="img/new_seo-10-512.png">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.accessories') }}</label>
                                    {!! Form::text('accessories', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.guarantee') }}</label>
                                    {!! Form::text('warranty', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.promotion') }}</label>
                                    {!! Form::text('promotion', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.condition') }}</label>
                                    {!! Form::text('condition', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.status') }}</label><br>
                                    {!! Form::select('status', array(
                                        trans('remember.one') => trans('remember.stillproduct'),
                                        trans('remember.zero') => trans('remember.effeteproduct'),
                                        ), 's', ['class' => 'form-control']) 
                                    !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.description') }}</label>
                                    {!! Form::textarea('description', null, ['class' => 'ckeditor']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.Category') }}</label>
                                    {!! Form::select('category', $category_list->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.featured') }}</label><br>
                                    {{ trans('remember.Yes') }} {!! Form::radio('featured', trans('remember.one'), false)!!}
                                    {{ trans('remember.No') }} {!! Form::radio('featured', trans('remember.zero'), true) !!}
                                </div>
                                {!! Form::submit(trans('remember.add'), ['class' => 'btn btn-primary']) !!}
                                <a href="{{ asset('admin/product')}}" class="btn btn-danger">{{ trans('remember.Cancel') }}</a>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>{{ trans('remember.Screen') }}</label>
                                    {!! Form::text('screen', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.Operating') }}</label>
                                    {!! Form::text('operating', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.Cameraafter') }}</label>
                                    {!! Form::text('after', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.Camerabefore') }}</label>
                                    {!! Form::text('before', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.CPU') }}</label>
                                    {!! Form::text('cpu', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.RAM') }}</label>
                                    {!! Form::text('ram', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                    <div class="form-group">
                                    <label>{{ trans('remember.Memory') }}</label>
                                    {!! Form::text('memory', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.Memorystick') }}</label>
                                    {!! Form::text('stick', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.SIM') }}</label>
                                    {!! Form::text('sim', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.Battery') }}</label>
                                    {!! Form::text('battery', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>  <!--/.main-->
@stop

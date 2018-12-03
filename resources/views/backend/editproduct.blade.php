@extends('backend.master')
@section('title', trans('remember.Editproducts'))
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ trans('remember.Editproducts') }}</div>
                <div class="panel-body">
                        {!! Form::open(['route' => ['editproduct', $product->id], 'method' =>'POST', 'files' => 'true']) !!}
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group" >
                                    <label>{{ trans('remember.NameProduct') }}</label>
                                    {!! Form::text('name', $product->name_product, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.Productprice') }}</label>
                                    {!! Form::number('price', $product->price, ['class' => 'form-control', 'required', 'min' => '10']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.Productimg') }}</label>
                                    {!! Form::file('img', ['class' => 'form-control hidden', 'id' => 'img', 'onchange' => 'changeImg(this)']) !!}
                                    <img id="avatar" class="thumbnail" src="{{ asset(config('constant.avatar') . $product->img) }}">
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.accessories') }}</label>
                                    {!! Form::text('accessories', $product->accessories, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.guarantee') }}</label>
                                    {!! Form::text('warranty', $product->warranty, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.promotion') }}</label>
                                    {!! Form::text('promotion', $product->promotion, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.condition') }}</label>
                                    {!! Form::text('condition', $product->condition, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.status') }}</label>    
                                    {!! Form::select ('status', [trans('remember.one') => trans('remember.stillproduct'), trans('remember.zero') => trans('remember.effeteproduct')], $product->status, ['class' =>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('remember.description') }}</label>
                                    {!! Form::textarea('description', $product->description, ['class' => 'ckeditor']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.Category') }}</label>
                                    {!! Form::select('category', $list_category->pluck('name', 'id'), $list_category->id = $product->category_id, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.featured') }}</label><br>
                                    {{ trans('remember.Yes') }}
                                    {!! Form::radio('featured', trans('remember.one'), ($product->featured == 1)?1:0) !!}
                                    {{ trans('remember.No') }}
                                    {!! Form::radio('featured', trans('remember.zero'), ($product->featured == 0)?1:0) !!}
                                </div>
                                {!! Form::submit(trans('remember.edit'), ['class' => 'btn btn-primary']) !!}
                                <a href="{{ asset('admin/product') }}" class="btn btn-danger">{{ trans('remember.Cancel') }}</a>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group" >
                                    <label>{{ trans('remember.Screen') }}</label>
                                    {!! Form::text('screen', $product->screen, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.Operating') }}</label>
                                    {!! Form::text('operating', $product->operating, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.Cameraafter') }}</label>
                                    {!! Form::text('after', $product->camera_after, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.Camerabefore') }}</label>
                                    {!! Form::text('before', $product->camera_before, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.CPU') }}</label>
                                    {!! Form::text('cpu', $product->cpu, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.RAM') }}</label>
                                    {!! Form::text('ram', $product->ram, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.Memory') }}</label>
                                    {!! Form::text('memory', $product->memory, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.Memorystick') }}</label>
                                    {!! Form::text('stick', $product->memory_stick, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.SIM') }}</label>
                                    {!! Form::text('sim', $product->sim, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group" >
                                    <label>{{ trans('remember.Battery') }}</label>
                                    {!! Form::text('battery', $product->battery_capacity, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                        </div>
                        {{-- {{ csrf_field()}}
                    </form> --}}
                    {!! Form::close() !!}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>  <!--/.main-->
@stop

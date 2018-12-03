@extends('backend.master')
@section('title', trans('remember.Editcategory'))
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
                        {{ trans('remember.Editcatalog') }}
                    </div>
                    <div class="panel-body">
                        @include('errors.note')
                        {!! Form::open(['route' => ['editcategory', $category->id], 'method' => 'POST']) !!}
                        <div class="form-group">
                            <label>{{ trans('remember.Namecate') }}</label>
                            {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => trans('remember.Namecate'), 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit(trans('remember.edit'), ['class' => 'form-control btn btn-primary']) !!}
                        </div>
                        <div class="form-group">
                            <a href="{{ asset('admin/category') }}" class="form-control btn btn-danger">{{ trans('remember.Cancel') }}</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop

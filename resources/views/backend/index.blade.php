@extends('backend.master')
@section('title', trans('remember.Administrator'))
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('remember.Home') }}</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-blue panel-widget ">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">{{ $product }}</div>
                        <div class="text-muted">{{ trans('remember.Product') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-orange panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">{{ $comment }}</div>
                        <div class="text-muted">{{ trans('remember.Comment') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">24</div>
                        <div class="text-muted">{{ trans('remember.User') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-red panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">{{ $category }}</div>
                        <div class="text-muted">{{ trans('remember.Category') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-red">
                <div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>{{ trans('remember.Calendar') }}</div>
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div><!--/.col-->
    </div><!--/.row-->
</div>
@stop

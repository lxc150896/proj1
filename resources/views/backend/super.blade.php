@extends('backend.master')
@section('title', trans('remember.listAdmin'))
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ trans('remember.listAdmin') }}</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div>
                               <div class="container">
                                   <div id="post"><button type="button" class="btn btn-primary btn-add" data-toggle="modal" data-target="#modal-add">{{ trans('remember.addAdmin') }}</button></div>
                                   <div class="modal fade" id="modal-add" role="dialog">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        {!! Form::open(array('route' => 'addAdmin', 'method' => 'POST'), ['action' => asset('admin/super/add')]) !!}
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">{{ trans('remember.addAdmin') }}</h4>
                                            </div>
                                            <div class="modal-body">
                                              <div class="form-group">
                                                <label>{{ trans('remember.email') }}</label>
                                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('remember.Email')]) !!}
                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('remember.password') }}</label>
                                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('remember.Pass')]) !!}
                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('remember.level') }}</label>
                                                {!! Form::select('level', array(
                                                    trans('remember.one') => 'Admin',
                                                    trans('remember.zero') => 'Super Admin',
                                                ), 's', ['class' => 'form-control']) 
                                                !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::submit(trans('remember.addAdmin'), ['class' => 'btn btn-primary']) !!}
                                            {!! Form::submit(trans('remember.close'), ['class' => 'btn btn-danger', 'data-dismiss' => 'modal']) !!}                                      
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sidebar">@if (session('status'))
                        <div align="center" class="colo">{{ session('status') }}</div>
                    @endif</div>
                    <table class="table table-bordered">
                        <thead class="thearch">
                            <tr class="bg-primary">
                                <th>{{ trans('remember.id') }}</th>
                                <th>{{ trans('remember.name') }}</th>
                                <th>{{ trans('remember.password') }}</th>
                                <th>{{ trans('remember.option') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->password }}</td>
                                <td>
                                    <div>
                                        <button type="button" class="btn btn-warning btn-add" data-toggle="modal" data-target="#modal-update">{{ trans('remember.edit') }}</button>
                                        <a onclick="return confirm_delete()" href="{{ asset('admin/super/delete/' . $admin->id) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>{{ trans('remember.delete') }}</a>
                                    </div>                     

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
@stop

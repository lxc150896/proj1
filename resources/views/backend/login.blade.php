<!DOCTYPE html>
<html>
<head>
<base href="{{ asset('bower_components/layout/backend') }}/">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ trans('remember.Login') }}</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">{{ trans('remember.Login') }}</div>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'login', 'method' => 'POST')) !!}
                        <fieldset>
                            @include('errors.note')
                            <div class="form-group">
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('remember.Email')]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('remember.Pass')]) !!}
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('remember', trans('remember.Remember Me'), false, ['class' => 'checkbox']) !!}
                                    {{ trans('remember.Remember Me') }}
                                </label>
                            </div>
                            {!! Form::submit(trans('remember.Login'), ['class' => 'btn btn-primary']) !!}
                        </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
</html>

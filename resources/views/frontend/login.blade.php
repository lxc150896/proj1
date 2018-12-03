<!doctype html>
<html>
<head>
    <base href="{{ asset('bower_components/web') }}/">
    <title>{{ trans('frontend.login') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
    <!-- /css -->
</head>
<body>
    <h1 class="w3ls">{{ trans('frontend.login') }}</h1>
    <div class="content-w3ls">
        <div class="content-agile1">
            <h2 class="agileits1">{{ trans('frontend.diamond') }}</h2>
            <p class="agileits2">{{ trans('frontend.lorem') }}</p>
        </div>
        <div class="content-agile2">
            {!! Form::open(array('route' => 'customer', 'method' => 'POST')) !!}
            @if (session('login'))
            <div class="errors">{{ session('login') }}</div>
            @else
            <h2 class="login">{{ trans('frontend.login') }}</h2>
            @endif
            <div class="form-control w3layouts">    
                {!! Form::email('email', old('email'), ['id' => 'email', 'placeholder' => trans('frontend.email'), 'required']) !!}
            </div>
            <div class="form-control agileinfo">    
                {!! Form::password('password', ['id' => 'password1', 'placeholder' => trans('frontend.pass'), 'required']) !!}
            </div>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('remember', trans('remember.remember'), false) !!}
                    {{ trans('frontend.remember') }}
                </label>
            </div>
            {!! Form::submit(trans('remember.Login'), ['class' => 'register']) !!}
            {!! Form::close() !!}
            <p class="wthree w3l">{{ trans('frontend.account') }}<a href="{{ asset('user/register') }}">{{ trans('frontend.registration') }}</a></p>
            <p class="wthree w3l">{{ trans('frontend.fast') }}</p>
            <ul class="social-agileinfo wthree2">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <p class="copyright w3l">{{ trans('frontend.design') }}<a href="#" target="_blank">{{ trans('frontend.lxc') }}</a></p>
</body>
</html>

<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en">  <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>BoiLagbe</title>

    {{--<script type="text/javascript" src={{ \Illuminate\Support\Facades\URL::asset('http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}></script>--}}
    <script type="text/javascript" src={{ \Illuminate\Support\Facades\URL::asset('../js/jquery.min.js') }}></script>
    <script src={{ \Illuminate\Support\Facades\URL::asset('../js/bootstrap.min.js') }}></script>
    <script src={{ \Illuminate\Support\Facades\URL::asset('../js/bootsnav.js') }}></script>

    <!-- CSS -->
    <link href={{\Illuminate\Support\Facades\URL::asset('../css/bootstrap.min.css')}} rel="stylesheet">
    <link href={{\Illuminate\Support\Facades\URL::asset('../css/font-awesome.css')}} rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel='stylesheet' type='text/css'>
    <link href={{ \Illuminate\Support\Facades\URL::asset('../css/animate.css') }} rel="stylesheet">
    <link href={{ \Illuminate\Support\Facades\URL::asset('../css/bootsnav.css') }} rel="stylesheet">
    <link href={{ \Illuminate\Support\Facades\URL::asset('../css/style.css') }} rel="stylesheet">
    <link href={{ \Illuminate\Support\Facades\URL::asset('../css/prime.css') }} rel="stylesheet">
</head>

<body>

@include("header")
<!-- Start Content -->
<div class="section" style="padding: 5px;">
    <div class="container">

        <!--recent books start-->

        <div class="row">
            <br>
            <h5>Reset Password</h5>

            <hr>
        </div>

        <p class="alert-success" style=" font-size: 20px; color: white; background: #ad0314 ">
            <?php

            $message = \Illuminate\Support\Facades\Session::get('login_page_message');

            if ($message){
                echo $message;
                \Illuminate\Support\Facades\Session::put('login_page_message',null);
            }

            ?>
        </p>

        {{--<p>asasasas</p>--}}

        <br>

        <!--recent books content-->
        <div class="row col-md-13">


            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="form-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>



        @include("footer")

    </div>
    <!-- End Content -->

</div>
</body>

</html>

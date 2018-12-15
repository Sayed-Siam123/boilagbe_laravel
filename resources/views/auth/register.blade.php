<!DOCTYPE html>
<html lang="en">  <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>BoiLagbe</title>

    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/bootsnav.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/prime.css" rel="stylesheet">


</head>
<body>
<!-- Header stars -->
@include ("header");
<!-- header ends -->


<!-- Start Content -->
<div class="section" style="padding: 5px;">
    <div class="container">

        <!--recent books start-->

        <div class="row">
            <br>
            <h5>Sign Up</h5>

            <hr>
        </div>

        <p class="alert-success" style=" font-size: 20px; color: white; background: #ad0314 ">
            <?php

            $message = \Illuminate\Support\Facades\Session::get('signup_page_message');

            if ($message){
                echo $message;
                \Illuminate\Support\Facades\Session::put('signup_page_message',null);
            }

            ?>
        </p>

        <!--recent books content-->
        <div class="row col-md-13">


            <p>Already registered. Then <a href={{route('login')}}><b>log In </b></a></p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="form-group">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Enter Your Name" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong style="color:  #e74c3c">{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                    <div class="form-group">
                        <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" placeholder="Enter Your Loation" required autofocus>

                        @if ($errors->has('location'))
                            <span class="invalid-feedback" role="alert">
                                        <strong style="color:  #e74c3c">{{ $errors->first('location') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                    <div class="form-group">
                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Enter Your Mobile Number" required autofocus>

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                        <strong style="color:  #e74c3c">{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="form-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter Your Email Address"  required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong style="color:  #e74c3c">{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter Your Password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong style="color:  #e74c3c">{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @include("footer")
    </div>
    <!-- End Content -->
    <script>
        function validation()
        {
            var password = document.getElementById("password");
            var confirm_password = document.getElementById("check_password");
            alert(password);
            alert(check_password);
            if(password.value != check_password.value)
            {
                check_password.setCustomValidity("Passwords Don't Match");
            } else
            {
                check_password.setCustomValidity('');
            }
            password.onchange = validatePassword;
            check_password.onkeyup = validatePassword;
        }

    </script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootsnavs -->
    <script src="js/bootsnav.js"></script>
</div>
</body>
</html>

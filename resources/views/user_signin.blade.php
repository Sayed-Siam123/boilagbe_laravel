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

@include("header")
<!-- Start Content -->
<div class="section" style="padding: 5px;">
    <div class="container">

        <!--recent books start-->

        <div class="row">
            <br>
            <h5>Login</h5>

            <hr>
        </div>

        <!--recent books content-->
        <div class="row col-md-13">


            <p>If you are not registerd.Please <a href="/signup"> <b>Sign Up</b></a></p>
            <form action="/loginDB" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="loginNUmber">Username</label>
                    <input type="text" class="form-control input-sm" name="username_login" id="phoneNumber" placeholder="Your Phone Number or Email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control input-sm" name="password_login" id="bookCondition" placeholder="Password">
                </div>


                <div class="row">
                    <input type="submit" name="login" class="btn btn-primary btn-block" value="Login" style="min-width:120px; margin-top:5px">
                </div>
            </form>
        </div>

        @include("footer")

    </div>
    <!-- End Content -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootsnavs -->
    <script src="js/bootsnav.js"></script>
    </div>
</body>

</html>

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
            }

            ?>
        </p>

        <!--recent books content-->
        <div class="row col-md-13">


            <p>Already registered. Then <a href="/login"><b>log In </b></a></p>

            <form id="myForm" action="/signupDB" onsubmit="validation()" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"  class="form-control input-sm" name="user_name" placeholder="ex: Jhon Lenon x" required>
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control input-sm" name="user_location" placeholder="ex: Bosundhora,Dhaka" required>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" class="form-control input-sm" name="user_phonenumber" placeholder="ex:01*********" pattern="^\d{4}\d{3}\d{4}$" required >
                </div>
                <div class="form-group">
                    <label for="emailAddress">Email Address</label>
                    <input type="text" class="form-control input-sm" name="user_emailAddress" placeholder="Optional" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control input-sm" name="user_password" id="user_password" required>
                </div>
                <div class="form-group">
                    <label for="password">Confirm Pasword</label>
                    <input type="password" class="form-control input-sm" name="check_password" id="check_password" required>
                </div>
                <div class="row">
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Sign Up" style="width:100%;min-width:120px; margin-top:5px">
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

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

@include("header_aftersignin")

<!-- header ends -->


<!-- Start Content -->
<div class="section" style="padding: 5px;">
    <div class="container">

        <!--recent books start-->

        <!--recent books content-->
        <div class="row col-md-13">

            <form id="myForm" action="/UserProfile" onsubmit="validation()" method="post">
                    {{csrf_field()}}

                @foreach($sql1 as $row1)
                      <h3>{{$row1->user_name}}</h3>
                      <h6>{{$row1->user_email_address}}</h6>
                      <h4>Update User Information</h4><br>

                      <div class="form-group">
                              <label for="location">Location</label>
                              <input type="text" class="form-control input-sm" name="user_location" value="{{$row1->user_location}}">
                      </div>
                      <div class="form-group">
                              <label for="phoneNumber">Phone Number</label>
                              <input type="text" class="form-control input-sm" name="user_phonenumber" value="{{$row1->user_phone_number}}">
                      </div>

                      <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control input-sm" name="user_password" id="user_password" value="{{$row1->user_password}}"  required>
                      </div>
                     <div class="fom-group">
                              <label or="password">Confirm Password</label>
                              <input type="password" class="form-control input-sm" name="check_password" id="check_password" required>

                      </div>
                      <div class="row">
                       <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update" style="width:100%;min-width:120px; margin-top:5px" onclick="user_profile_Edit.php">
                      </div>
                    @endforeach
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

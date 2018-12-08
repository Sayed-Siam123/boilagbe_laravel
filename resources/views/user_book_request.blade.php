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
    <!---->





</head>
<body>
<!-- Header stars -->
@include("header_aftersignin")
<!-- header ends -->


<!-- Start Content -->
<div class="section" style="padding: 5px;">
    <div class="container">

        <!--recent books start-->

        <div class="row">
            <br>
            <h5>Request Your Desire Book </h5>

            <hr>
        </div>

        <!--recent books content-->
        <div class="row col-md-13">

            <form action="/book_request" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="bookName">Book Name</label>
                    <input type="text" name="bookName" class="form-control input-sm" id="bookName" placeholder="Your Book Name" required>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" class="form-control input-sm" id="author" placeholder="Author Name" >
                </div>
                <div class="form-group">
                    <label for="edition">Edition (Optional)</label>
                    <input type="text" name="edition" class="form-control input-sm" id="edition" placeholder="Book Edition">
                </div>
                <div class="form-group">
                    <label for="bookCondition">Book Condition</label>
                    <select name="book_condition">
                        <option value="Very Good">Very Good</option>
                        <option value="Good">Good</option>
                        <option value="Average">Average</option>
                        <option value="Bad">Bad</option>
                        <option value="Very Bad">Very Bad</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deliveryLocation">Delivery Receive Location</label>
                    <input type="text" name="deliveryLocation" class="form-control input-sm" id="deliveryLocation" placeholder="Delivery Location" >
                </div>
                <!--   <div class="form-group">
                           <label for="phoneNumber">Phone Number</label>
                           <input type="text" class="form-control input-sm" id="phoneNumber" placeholder="Optional" required>
                   </div>-->
                <div class="row">
                    <input type="submit" name="login" class="btn btn-primary btn-block" value="Submit" style="width:100%;min-width:120px; margin-top:5px">
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

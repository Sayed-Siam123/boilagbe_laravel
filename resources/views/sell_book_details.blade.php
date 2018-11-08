
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
<!-- Start Navigation -->

@include("header_aftersignin")
<div class="clearfix"></div>

<!-- Start Content -->
<div class="section" style="padding: 5px;">

    <div class="container">
        @foreach($respond as $result)
        <div class="row">
            <p>
            <h4>{{$result->sell_book_name}}</h4><span>{{$result->sell_book_author}} ({{$result->sell_book_edition}}-th edition)</span>
            <h6 style="float: right;color:red;">Price:<span>{{$result->sell_book_price}} Taka</span></h6>
            </p>
        </div>
        @endforeach
        <div class="row">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" ></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" ></li>
                </ol>
                <!-- Wrapper for slides -->


                <div class="carousel-inner">
                       @foreach($respond1 as $index=>$result1)
                        <div class="item @if($index == '1'){{'active'}}@endif">
                        <img src="book\{{$result1->pic_name}}" alt="...">
                        <!--<div class="carousel-caption">-->
                        <!--  <h2>Heading</h2>-->
                        <!--</div>-->
                    </div>
                    @endforeach

                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>

        <div class="row">
            @foreach($respond as $result)
            <p>
            <h6>Book Condition</h6><hr>
            <span> {{$result->sell_book_condition}}</span><br>

            </p>
            <p>
            <h6>Delivery Location</h6><hr>
            <span>{{$result->sell_book_delivary_location}}</span><br>

            </p>

            <p>

            <h6>Seller Contact</h6><hr>
            <span>Email: {{$result->user_email_address}}</span><br>
            <span>Phone: {{$result->sell_book_phone_number}}</span>
            </p>
            @endforeach
                <div class="container col-md-3" style="width:50%; height:40%;padding:5px">

                <button type="button" onclick=""class="btn btn-primary btn-block" style="width:70%;min-width:120px;margin-top:5px">Order</button>

            </div>

        </div>

    </div>

    @include("footer")

</div>
<!-- End Content -->

<!-- START JAVASCRIPT -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Bootsnavs -->
<script src="js/bootsnav.js"></script>

</body>
</html>

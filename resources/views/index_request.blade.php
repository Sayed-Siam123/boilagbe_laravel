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
<!-- Header stars -->
@include("header_aftersignin")
<!-- header ends -->
<div class="section" style="padding: 5px;">
    <div class="container">

        <!--recent books start-->

        <div class="row">

            <br>
            <h5>Request Your Desire Book </h5>
            <!-- add book section-->
            <br>
            <p class="alert-success" style=" font-size: 20px; color: white; background: #ad0314 ">
            <?php
            $message = \Illuminate\Support\Facades\Session::get('index_request_message');

            if ($message){
                echo $message;
                \Illuminate\Support\Facades\Session::put('index_request_message',null);
            }

            ?>

            <a href="/user_request_book_add" type="button"
               style="
                         width: 120px;
                         min-width:2vmin;
                         max-height:45px;
                         position: fixed;
                         background-color:#ad0314;
                         right: 0px;
                         font-size: 2.5vmin;
                         text-align: center;
                         color: white;
                         border-radius: 70px;
                         border:none;

                         /* Safari */
                        -webkit-transform: rotate(-0deg);
                         /* Firefox */
                        -moz-transform: rotate(-0deg);
                         /* IE */
                        -ms-transform: rotate(-0deg);
                         /* Opera */
                        -o-transform: rotate(-0deg);" >
                Add More</a><hr>

        </div>



            <!--recent books content-->
        <div class="row col-md-1"  style="width:100%;margin-bottom:24px">

            @foreach($res as $row)

                @if($row->status=='0')

                @else

           <div class="container col-md-3" style="width:100%;height:10%;min-height:80px;padding:1vmin">

                              <h4 class="text-justify" style="margin-bottom:.5vmin;font-size: 3.5vmin">{{$row->request_book_name}}</h4>
                              <p class="text-justify" style="margin-bottom:.5vmin;font-size: 3.5vmin;">{{$row->request_book_author}}</p>
                              <hp class="text-justify" style="margin-bottom:.5vmin;font-size: 3.0vmin;"></hp>{{$row->request_book_condition}}<hr>

                              <p class=\"text-justify\" style="font-size: 2vmin;"><b>Receive Location:</b><br>{{$row->request_book_receive_location}}</p>


                            <a href ="sell_books_details.php"><button type="submit"class="btn btn-primary btn-block" style="width:100%;min-width:120px;margin-top:5px">Want to Sell</button></a>
                              </div>

            @endif
            @endforeach

        </div>



       @include("footer")

    </div>
    <!-- End Content -->
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Bootsnavs -->
<script src="js/bootsnav.js"></script>


</body>
</html>

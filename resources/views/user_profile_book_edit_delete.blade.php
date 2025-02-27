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


<!-- Start Content -->
<div class="section" style="padding: 5px;">
    <div class="container">

        <!--recent books start-->

        <div class="row">
            <br>
            <h5>Your Sell Directory</h5>
            <br>
            <p class="alert-success" style=" font-size: 20px; color: white; background: #ad0314 ">
            <?php

            $message = \Illuminate\Support\Facades\Session::get('user_profile_edit_delete_message');

            if ($message){
                echo $message;
                \Illuminate\Support\Facades\Session::put('user_profile_edit_delete_message',null);
            }

            ?>

            <!-- add book section-->
            <a href="/user_new_book_add" type="button"
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
                Add More</a>

            <hr>
        </div>

        <!--recent books content-->

        @foreach($res as $row)

            @if($row->status=='0')

            @else


            <div class="row col-md-1"  style="width:100%;margin-bottom:24px">


            @foreach($img as $col)
                @if($row->id==$col->post_id)
            <div class="container col-md-3" style="float:left;width:50%; height:40%;padding:5px">

                <img src="book\{{$col->pic_name}}" class="img-thumbnail" alt="bookView" style="max-width=100%;min-height:150px;height=336">

            </div>
                    @endif
            @endforeach
            <div class="container col-md-3" style="float:left;width:50%; height:10%;min-height:80px;padding:1vmin">
                <input type="hidden" value="{{$row->id}}" name="selectPostId_inSell">
                <h6 class="text-justify" style="margin-bottom:.5vmin;font-size: 2.5vmin;">{{$row->sell_book_name}}</h6>
                <h6 class="text-justify" style="margin-bottom:.5vmin;font-size: 2.5vmin;">By {{$row->sell_book_author}}</h6>
                <h6 class="text-justify" style="margin-bottom:.5vmin;font-size: 2vmin;color: #8585ad">{{$row->sell_book_condition}}</h6>
                <p class="text-justify" style="font-size: 2vmin;"> Dr. Nova Ahmed loves adnan and rifat. this two legends had survived CSe4349759 course by reading this book. Bazar price 2000000 tk but i can give you this only at 10tk</p>

            </div>

            {{--eikhane last kaj sesh hoise,
                        ekhn route koro r sathe kore data edit r delete er jonne prepare koro--}}

            <form method="get" action="/editBookinSell">
                <button type="login" value="Edit" type="submit" class="btn btn-primary btn-block" style="width:20%;min-width:120px;margin-top:5px;float:left;margin-left:2px">Edit</button>
                <input type="hidden" value="{{$row->id}}" name="selectPostId_inSell">
            </form>

            <form method="get" action="/deleteBookinSell">
                <button type="login" value="Delete" type="submit" class="btn btn-primary btn-block" style="width:20%;min-width:120px;margin-top:5px;float:left;margin-left:2px">Delete</button>
                <input type="hidden" value="{{$row->id}}" name="selectPostId_inSell">
            </form>


            {{--eikhane last kaj sesh hoise,
                        ekhn route koro r sathe kore data edit r delete er jonne prepare koro--}}


        </div>

        @endif
        @endforeach

        <form action="/dataPass" method="post">
            {{ csrf_field() }}
        <div class="row">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Load More" style="min-width:120px; margin-top:5px">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Feed Back" style="min-width:120px; margin-top:5px">
        </div>
        </form>


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

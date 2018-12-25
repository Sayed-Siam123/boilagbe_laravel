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
    <link href="css/indexToggole.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#tabs" ).tabs();
        } );
    </script>


</head>
<body>
<!-- Header stars -->
@if(\Illuminate\Support\Facades\Auth::id())
    @include("header_aftersignin")
@else
    @include("header")
@endif
<!-- header ends -->


<!-- Start Content -->
<div class="section" style="padding: 5px;">

    <div class="container">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'buyBooks')" id="defaultOpen">Buy Books</button>
            <button class="tablinks" onclick="openCity(event, 'requestBooks')">Request Books</button>
        </div>


        <div id="buyBooks" class="tabcontent">


            <br><form action="" class="search-form">
                <div class="form-group has-feedback">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" name="search" id="search" placeholder="search">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </form><br>


            @foreach($res1 as $row)
            <div class="row col-md-1"  style="width:100%;margin-bottom:24px">
                <div class="container col-md-3" style="float:left;width:50%; height:40%;padding:5px">

                    @foreach($img as $row1)
                        @if($row->id==$row1->post_id)
                    <img src="book/{{$row1->pic_name}}" class="img-thumbnail" alt="bookView" style="max-width:100%;min-height:150px;height=336">
                        @endif
                    @endforeach
                    <form method="get" action="/wanttobuy">
                        <button name="login" value="Submit" type="submit" class="btn btn-primary btn-block" style="margin-left:;width:70%;min-width:120px;margin-top:5px">Want to Buy</button>
                        <input type="hidden" value="{{$row->id}}" name="selectPostId">
                    </form>
                </div>


                <div class="container col-md-3" style="float:left;width:50%; height:10%;min-height:80px;padding:1vmin">
                    <input type="hidden" value="{{$row->id}}" name="selectPostId">
                    <h6 class="text-justify" style="margin-bottom:.5vmin;font-size: 2.5vmin;">{{$row->sell_book_name}}</h6>
                    <h6 class="text-justify" style="margin-bottom:.5vmin;font-size: 2.5vmin;">By {{$row->sell_book_author}}</h6>
                    <h6 class="text-justify" style="margin-bottom:.5vmin;font-size: 2vmin;color: #8585ad">{{$row->sell_book_condition}}</h6>

                </div>

            </div>
            @endforeach
        </div>

        <div id="requestBooks" class="tabcontent">


            <br><form action="" class="search-form">
                <div class="form-group has-feedback">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" name="search" id="search" placeholder="search">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </form>
            <br>


            @foreach($res2 as $row1)

            <div class="row col-md-1"  style="width:100%;margin-bottom:24px">

                <div class="container col-md-3" style="width:100%;height:10%;min-height:80px;padding:1vmin">

                    <h4 class="text-justify" style="margin-bottom:.5vmin;font-size: 3.5vmin">{{$row1->request_book_name}}<sub>{{$row1->request_book_edition}} Edition</sub></h4>
                    <p class="text-justify" style="margin-bottom:.5vmin;font-size: 2.5vmin;">{{$row1->request_book_author}}</p>
                    <br>
                    <p style="margin-top: -15px" class=\"text-justify\" style="font-size: 2vmin;"><b>Receive Location: </b>{{$row1->request_book_receive_location}}<br></p>
                    <p style="margin-top: -15px"><b style="color: red">Price: </b>  Negotiable </p>


                    <a href ="sell_books_details.php"><button type="submit"class="btn btn-primary btn-block" style="width:100%;min-width:120px;margin-top:5px">Want to Sell</button></a>
                </div>
            </div>
            @endforeach

        </div>



        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>







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

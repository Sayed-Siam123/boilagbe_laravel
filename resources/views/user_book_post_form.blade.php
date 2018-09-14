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
    <link href="css/fine-uploader-new.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" />


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
            <h5>Add New Book</h5>

            <hr>
        </div>

        <!--recent books content-->
        <div class="row col-md-13">



            <form action="" onclick="" action="upload.php">
                <div class="form-group">
                    <label for="bookName">Book Name</label>
                    <input type="text"  class="form-control input-sm" id="bookName" placeholder="Book Name" required >
                </div>

                <div class="form-group">
                    <label for="bookAuthor">Book Author</label>
                    <input type="text" class="form-control input-sm" id="bookAuthor" placeholder="ex: author name">
                </div>
                <div class="form-group">
                    <label for="bookEdition">Book Edition</label>
                    <input type="text" class="form-control input-sm" id="bookEdition" placeholder="ex: Xth">
                </div>

                <div id="drop">
                    Drop Here

                    <a>Browse</a>
                    <input type="file" name="upl" multiple />
                    <ul>
                        <li class="working">
                            <input type="text" value="0" data-width="48" data-height="48" data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" />
                            <p>Sunset.jpg <i>145 KB</i></p>
                            <span></span>
                        </li>
                    </ul>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control input-sm" id="password" placeholder="Optional">
                </div>
                <div class="form-group">
                    <label for="password">Confirm Pasword</label>
                    <input type="text" class="form-control input-sm" id="password" placeholder="Optional">
                </div>
            </form>


        </div>

        <div class="row">
            <input type="submit" onclick="" class="btn btn-primary btn-block" value="Sign Up"style="margin-left:;width:100%;min-width:120px;margin-top:5px;background-color:# #ffa366">

        </div>

       @include("footer")

    </div>
    <!-- End Content -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootsnavs -->
    <script src="js/bootsnav.js"></script>

    <script src="assets/js/jquery.knob.js"></script>
    <!-- jQuery File Upload Dependencies -->
    <script src="assets/js/jquery.ui.widget.js"></script>
    <script src="assets/js/jquery.iframe-transport.js"></script>
    <script src="assets/js/jquery.fileupload.js"></script>

    <!-- Our main JS file -->
    <script src="assets/js/script.js"></script>
</div>
</body>
</html>

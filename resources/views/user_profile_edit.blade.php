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
    <div class="section" style="padding: 5px">
        <div class="container">
  
    <!--Profile starts-->
          <div class="row">
          <br>
          <h5>Edit Profile</h5>
          <hr>
          </div>
          <div class="row col-md-1"  style="width:100%;margin-bottom:24px">
             <div class="row">
                  <div class="col-xs-12 col-sm-8 col-md-4 col-lg-10 col-xs-offset-0 col-sm-offset-1 col-md-offset-3 col-lg-offset-1 toppad" >   
                    <!-- ok -->
                     <div class="panel panel-info">

            
      
                
          <div class="panel-heading">
                     <h3 class="panel-title"></h3>
                   </div>
                 <div class="panel-body">
                  <div class="row">  
        <div class=" col-md-12 col-lg-12">

                      <table class="table table-user-information">
                        <tbody>
                        @foreach($sql as $row)
                        <tr>
                            <td style="font-size:2vmin">Name</td>
                            <td style="font-size:2vmin">{{$row->name}}</td>
                          </tr>
                        <tr>

                            <td style="font-size:2vmin">Location:</td>
                            <td style="font-size:2vmin">{{$row->location}}</td>
                          </tr>         
                          <tr>
                            <td style="font-size:2vmin">Email Address:</td>
                            <td style="font-size:2vmin">{{$row->email}}</td>
                          </tr>
                            <td style="font-size:2vmin">Phone Number:</td>
                            <td style="font-size:2vmin">{{$row->phone}}</td>
                          </tr>
                          <tr>
                            <td style="font-size:2vmin">Password:</td>
                            <td style="font-size:2vmin">{{$row->password}}</td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>

                    </div>
                  </div>
                 </div>
                <a class="btn btn-primary btn-block" href="/user_update_profile_info" style="margin-left:;width:100%;min-width:120px;margin-top:5px">Update Profile</a>
                    </div>

                  </div><br>

                 <form action="/pro_pic" method="post" enctype="multipart/form-data">
                     {{csrf_field()}}
                 <div class="col-xs-12 col-sm-8 col-md-12 col-lg-10 col-xs-offset-0 col-sm-offset-1 col-md-offset-3 col-lg-offset-1 toppad">
                     <table class="table">
                         <tbody>
                         <tr>
                             <td style="font-size:2vmin"><h6>Upload your Profile PIcture</h6></td>
                             <div class="form-group">
                                 <input type="file" name="image"/>
                             </div>
                         </tr>
                         </tbody>
                     </table>




                         <div class="row">
                             <input type="submit" name="login" class="btn btn-primary btn-block" value="submit" style="width:100%;min-width:120px; margin-top:5px">
                         </div>

                 </div>
                 </form>

             </div>
</div>
</div>
       
    </div>
  </div>
@include("footer")
    <!-- End Content -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script>
    <script src="js/bootstrap.min.js"></script>   
    <!-- Bootsnavs -->
    <script src="js/bootsnav.js"></script>
</body>
</html>

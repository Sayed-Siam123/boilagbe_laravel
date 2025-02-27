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
            <h5>Edit Book Info</h5>

            <hr>
        </div>

        <!--recent books content-->
        <div class="row col-md-13">

            @foreach($respond as $row)

            <form action="/updateBook" onclick="" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="bookName">Book Name</label>
                    <input type="text" name="bookName" value="{{$row->name}}"  class="form-control input-sm" id="bookName" placeholder="Your Book Name">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="authorName" value="{{$row->author}}" class="form-control input-sm" id="author" placeholder="Author Name">
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
                    <label for="bookEdition">Book Edition</label>
                    <input type="text" name="bookEdition" value="{{$row->edition}}" class="form-control input-sm" id="bookEdition" placeholder="Book Edition">
                </div>
                <div class="form-group">
                    <label for="bookPrice">Book Price</label>
                    <input type="text" name="bookPrice" value="{{$row->price}}" class="form-control input-sm" id="bookPrice" placeholder="Book Price">
                </div>
                <div class="form-group">
                    <label for="deliveryLocation">Delivery Location</label>
                    <input type="text" name="bookDeliveryLocation" value="{{$row->location}}" class="form-control input-sm" id="deliveryLocation" placeholder="Delivery Location">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" name="phonenumber" value="{{$row->number}}" class="form-control input-sm" id="phoneNumber" placeholder="Optional">
                </div>

                <div class="row">
                    <button type="submit" name="login" class="btn btn-primary btn-block" value="Submit" style="width:100%;min-width:120px; margin-top:5px">Update</button>
                    <input type="hidden" value="{{$row->id}}" name="selectPostId_inUpdate">
                </div>


            </form>

        @endforeach


        </div>

    </div>

    @include("footer")

</div>
<!-- End Content -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function handleFileSelect(evt) {
        var files = evt.target.files;
        for (var i = 0, f; f = files[i]; i++) {

            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();


            reader.onload = (function(theFile) {
                return function(e) {
                    var span = document.createElement('span');
                    span.innerHTML = ['<img style="width:45vmin; height: 45vmin;border-width:2px; border-style:solid;border-color:#ad0314;border-radius:10px; margin:8px;" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                    document.getElementById('list').insertBefore(span, null);
                };
            })(f);

            reader.readAsDataURL(f);
        }
    }
    document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>

{{--<script>

    $(function(){
        $("input[type='submit']").click(function(){
            var $fileUpload = $("input[type='file']");
            if (parseInt($fileUpload.get(0).files.length)>1){
                alert("You can only upload a maximum of 2 files");

            }
        });
    });


</script>--}}

<!-- Bootsnavs -->
<script src="js/bootsnav.js"></script>


</body>
</html>

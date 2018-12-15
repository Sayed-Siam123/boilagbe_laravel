<nav class="navbar navbar-default bootsnav">

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <div class="container">
        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul>
                <li style="list-style-type: none"> <a href="/user_Profile_Edit"> <img src="ProPicture\{{\Illuminate\Support\Facades\Auth::user()->avatar}}" alt="Avatar" class="avatar"></a>
                </li>
            </ul>

        </div>
        <!-- End Atribute Navigation -->

        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <!--    <a class="navbar-brand" href="#"><img src="images/brand/Logomakr_5EWeEB.png" class="logo" alt=""></a>-->

            <h2> <a style="font-size: 25px;margin-top: 10px" class="navbar-brand"  href="/">Boi Lagbe</a></h2>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">

                <li class="active"><a href="/">Home</a></li><!-- profile_sell_book_directory.php will be profile main page-->
                <li><a href="\user_profile_book_edit_delete">Sell</a></li>
                <li><a href="/IndexRequests">Request</a></li>
                <!--<li><a href="user_buy_books.php">Buy Books</a></li>-->
                <li><a href="user_Profile_Edit">Profile</a></li>

                <li><a href="/logout">Log out</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

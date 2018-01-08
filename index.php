<?php session_start() ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <!-- If IE use the latest rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Set the page to the width of the device and set the zoon level -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="description" content="AWEERA - Hair and Beauty">
    <meta name="author" content="TeamScorp">

    <title>AWEERA - Bridal, Hair & Beauty</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="css/loginstyle.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php include ("view/homepage/home-navbar.php");?>

<?php include ("view/homepage/ninja-slider.php");?>



<!-- Page Content -->
<div class="container">

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Welcome to <img class="img-circle" id="img_logo" src="img/aweera.png">
            </h1>
        </div>
        <div class="col-md-4 main-service-box">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> Hair Styles </h4>
                </div>
                <div class="panel-body">
                    <p> Let sensuous hair be yours.Get your hair styled the way you want from our professional hair stylists!
                        We offer you the Sri Lanka's Best hair cuts, hair settings, hair treatments and hair coloring services..</p>
                    <?php
                    if(!isset($_SESSION['user_id'])){
                        echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\"class=\"btn btn-default\" >Book Now</a>";}
                    else {
                        echo "<a href=\"controller/direct-user-handler.php\" class=\"btn btn-default\">Book Now</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 main-service-box">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-gift"></i> Bridal Services </h4>
                </div>
                <div class="panel-body">
                    <p>Are you ready for your big day? So are we. 
                        Our professionals will make sure your look holds up and carries you through the rest of your long, exciting day. Feel beautiful and have the wedding of your dreams! </p>
                    <?php
                    if(!isset($_SESSION['user_id'])){
                        echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\"class=\"btn btn-default\" >Book Now</a>";}
                    else {
                        echo "<a href=\"controller/direct-user-handler.php\" class=\"btn btn-default\">Book Now</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 main-service-box">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-compass"></i> Beauty Services </h4>
                </div>
                <div class="panel-body">
                    <p>Approach all your beauty care treatments under one roof - AWEERA offers you a wide range of beauty care treatments including makeup, pedicure, manicure, nail care and much more..</p>
                    <?php
                    if(!isset($_SESSION['user_id'])){
                        echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\"class=\"btn btn-default\" >Book Now</a>";}
                    else {
                        echo "<a href=\"controller/direct-user-handler.php\" class=\"btn btn-default\">Book Now</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <?php include('gallery-section.php');?>

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Business Services</h2>
        </div>
        <div class="col-md-6">
            <p>All your Hair and Beauty treatments under one roof for both Ladies and Gents. <br>
                Our Business Services includes:</p>
            <ul>
                <li>Hair Cuts</li>
                <li>Hair Setting</li>
                <li>Hair Treatments</li>
                <li>Hair Color</li>
                <li>Face and Body Treatments</li>
                <li>Waxing</li>
                <li>Threading</li>
                <li>Saree Draping</li>
                <li>Makeup</li>
                <li>Pedicure</li>
                <li>Manicure</li>
                <li>Nail Care</li>
            </ul>
            <p> "Life is an endless struggle full of frustrations and challenges, but eventually you find a <strong>  hairstylist</strong> who understands you"</p>
        </div>
        <div class="col-md-6">
            <img class="img-responsive" src="img/imghome/h11.jpg" alt="">
        </div>
    </div>
    <!-- /.row -->

    <?php include ('comment-slider.php');?>

    <?php include ('contact-us.php');?>



    <hr>

    <!-- Call to Action Section -->
    <div class="well">
        <div class="row">
            <div class="col-md-8">
                <p>Have a great hair day with our professional in AWEERA. <br>
                    <strong>"Life is more beautiful when you meet the right Hairdresser"</strong></p>
            </div>
            <div class="col-md-4">
                <?php
                if(!isset($_SESSION['user_id'])){
                    echo "<a class=\"btn btn-lg btn-default btn-block\" href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\" >Book Now</a>";}
                else {
                    echo "<a class=\"btn btn-lg btn-default btn-block\" href=\"controller/direct-user-handler.php\">Book Now</a>";
                }
                ?>
            </div>
        </div>
    </div>

    <hr>


    <?php include('view/modals/login-modal.php'); ?>

    <?php include('footer.php'); ?>


</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- script to handle model login -->
<script type="text/javascript" src="js/login.js"></script>


<!-- Script to scroll to contact -->
<script type="text/javascript">
    $("#contact_menu").click(function() {
        $('html, body').animate({
            scrollTop: $("#contact").offset().top
        }, 1000);
    });
</script>


<!-- Script to scroll to gallery -->
<!--<script type="text/javascript">
    $("#gallery_menu").click(function() {
        $('html, body').animate({
            scrollTop: $("#gallery").offset().top
        }, 1000);
    })
</script>
-->

</body>

</html>

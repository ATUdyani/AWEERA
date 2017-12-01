<?php require_once ('model/Database.php');
$db = new Database();
$db->connect();
?>

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

    <title>Aweera - Bridal, Hair & Beauty</title>

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

<?php include ("view/homepage/home-carousel.php");?>



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
                    <a href="appointments.html" class="btn btn-default">Book Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 main-service-box">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-gift"></i> Bridal Services </h4>
                </div>
                <div class="panel-body">
                    <p>Are you ready for your big day? So are we. Get you and your bridal squad dressed from us at AWEERA!
                        Our professionals will make sure your look holds up and carries you through the rest of your long, exciting day.</p>
                    <a href="appointments.html" class="btn btn-default">Book Now</a>
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
                    <a href="appointments.html" class="btn btn-default">Book Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <br>
    <!-- Portfolio Section -->
    <div id="gallery" class="row">
        <div class="col-lg-12">
            <h2 class="page-header"> Gallery </h2>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="img/imghome/h2.jpg" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="img/imghome/h3.jpg" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="img/imghome/h1.jpg" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="img/imghome/h12.jpg" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="img/imghome/h6.jpg" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-portfolio img-hover" src="img/imghome/h14.jpg" alt="">
            </a>
        </div>
    </div>
    <!-- /.row -->

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

    <br>

    <?php include ('view/comment-slider.php');?>

    <!-- Contact Us Section -->
    <div id="contact" class="row">
        <hr>
        <br>
        <br>

        <!-- Map Column -->
        <div class="col-md-8">
            <!-- Embedded Google Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7922.799465866995!2d79.86442985177537!3d6.842588651401578!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe6c7a3bf6e043a48!2sAweera+Hair+%26+Beauty!5e0!3m2!1sen!2slk!4v1500347822377" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h2 class="page-header">Contact Details</h2>
            <p>
                Hair Care & Beauty Treatments & Dressing by AWEERA<br>
                No. 220,<br>
                Solomon Peiris Avenue,<br>
                Mount Lavinia<br>
            </p>
            <p><i class="fa fa-phone"></i>
                <abbr title="Phone">P</abbr>: 0112727285</p>
            <p><i class="fa fa-envelope-o"></i>
                <abbr title="Email">E</abbr>: <a href="mailto:aweerahairandbeauty@gmail.com">aweerahairandbeauty@gmail.com</a>
            </p>
            <p><i class="fa fa-clock-o"></i>
                <abbr title="Hours">H</abbr>: Monday - Saturday: 9:00 AM to 7:00 PM</p>
            <ul class="list-unstyled list-inline list-social-icons">
                <li>
                    <a href="https://www.facebook.com/AweeraBeauty/"><i class="fa fa-facebook-square fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Contact Us Section -->


    <hr>

    <!-- Call to Action Section -->
    <div class="well">
        <div class="row">
            <div class="col-md-8">
                <p>Have a great hair day with our professional in AWEERA. <br>
                    <strong>"Life is more beautiful when you meet the right Hairdresser"</strong></p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-default btn-block" href="appointments.html">Book an Appointment</a>
            </div>
        </div>
    </div>

    <hr>

    <?php include('view/modals/login-modal.php'); ?>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; TeamScorp 2017</p>
            </div>
        </div>
    </footer>

</div>


<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- script to handle model login -->
<script type="text/javascript" src="js/login.js"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>


<!-- Script to scroll to contact -->
<script type="text/javascript">
    $("#contact_menu").click(function() {
        $('html, body').animate({
            scrollTop: $("#contact").offset().top
        }, 1000);
    });
</script>


<!-- Script to scroll to gallery -->
<script type="text/javascript">
    $("#gallery_menu").click(function() {
        $('html, body').animate({
            scrollTop: $("#gallery").offset().top
        }, 1000);
    });
</script>


</body>

</html>

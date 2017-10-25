<?php require_once ('model/database.php');
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
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top my-navbar" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile dis`play -->
        <div class="navbar-header link-1">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php"><img class="img-circle" id="img_logo" src="img/aweera.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class= "collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right my-primary-menu">
                <li class="link-1">
                    <a href="view/customer-appointment.php">Appointments</a>
                </li>
                <li id="gallery_menu" class="link-1">
                    <a href="#">Gallery</a>
                </li>
                <li class="link-1">
                    <a href="about.php">About</a>
                </li>
                <li id="contact_menu" class="link-1">
                    <a href="#contact">Contact</a>
                </li>
                <!--<li class="dropdown link-1">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="portfolio-1-col.html">1 Column Portfolio</a>
                        </li>
                        <li>
                            <a href="portfolio-2-col.html">2 Column Portfolio</a>
                        </li>
                        <li>
                            <a href="portfolio-3-col.html">3 Column Portfolio</a>
                        </li>
                        <li>
                            <a href="portfolio-4-col.html">4 Column Portfolio</a>
                        </li>
                        <li>
                            <a href="portfolio-item.html">Single Portfolio Item</a>
                        </li>
                    </ul>
                </li>-->

                <?php

                // checking if an user is logged in
                if(!isset($_SESSION['user_id'])){
                    echo "<li class=\"menu link-1\" id=\"login\"><a href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\" ><i class=\"fa fa-unlock-alt\"></i>Log In</a></li>";
                }
                // if the user is a registered customer, set the logout panel
                elseif ($_SESSION['type']=="Customer"){
                    echo "<li class=\"menu link-1\" id=\"logout\">
                        <div class=\"logout-content\">
                            <ul class=\"nav navbar-nav navbar-right\">
                                <li class=\"dropdown\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                        <span class=\"glyphicon glyphicon-user\"></span> 
                                        <strong>Welcome
                                            {$_SESSION['first_name']}
                                        </strong>
                                        <i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i>
                                    </a>

                                    <ul class=\"dropdown-menu\">
                                        <li>
                                            <div class=\"navbar-login\">
                                                <div class=\"row\">
                                                    <div class=\"col-lg-4\">
                                                        <p class=\"text-center\">
                                                            <span class=\"glyphicon glyphicon-user icon-size\"></span>
                                                        </p>
                                                    </div>
                                                    <div class=\"col-lg-8\">
                                                        <p class=\"text-left name-tag\">"
                                                                .$_SESSION['first_name']." ".$_SESSION['last_name'].
                                                        "</p>
                                                        <p class=\"text-left small\">
                                                            {$_SESSION['email']}
                                                        </p>
                                                        <p class=\"text-left\">
                                                        <form>
                                                            <input class=\"btn btn-primary btn-block btn-sm\" type=\"submit\" value=\"Edit Profile\" formaction=\"model/users.php\">
                                                        </form>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class=\"divider\"></li>
                                        <li>
                                            <div class=\"navbar-login navbar-login-session\">
                                                <div class=\"row\">
                                                    <div class=\"col-lg-12\">
                                                        <p>
                                                        <form>
                                                            <input class=\"btn btn-danger btn-block\" type=\"submit\" value=\"Log Out\" formaction=\"controller/logout.php\">
                                                        </form>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>";
                }
                else{
                    echo "<li class=\"menu link-1\" id=\"welcome-msg\">
                        <a href=\"controller/direct-user-handler.php\" class=\"loggedin\" ><span class=\"glyphicon glyphicon-user\"></span> <strong>Welcome ";
                    echo $_SESSION['first_name'];
                    echo "</strong></a></li>";
                }
                ?>

            </ul>

<!--            <div class="arrow-up"></div>
            <div class="login-form">
                <form method="post">
                    <h4>Log In</h4>

                    <div>
                        <p id="errorMsg"></p>
                    </div>

                    <div>
                        <input id="email" class="my-login-text" type="text" placeholder="Email" required="" name="email">
                    </div>

                    <div>
                        <input id="password" class="my-login-text" type="password" placeholder="Password" required=""  name="password">
                    </div>
                    <div class="clearfix" >
                        <a href="#">Forgot Password?</a>
                    </div>
                    <div>
                        <input class="my-login-button" type="submit" formaction="controller/login.php" value="Log In" name="submit">
                    </div>
                    <div>
                        <text>Don't have an account?</text>
                        <input class="my-login-button" type="button" value="Register">
                    </div>
                </form>
            </div>-->


        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>



<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide my-carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner my-image">
        <div class="item active">
            <div class="fill" style="background-image:url('img/imghome/aweerabanner1.jpg');"></div>
            <div class="carousel-caption">
                <h2></h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('img/imghome/aweerabanner10.jpg');"></div>
            <div class="carousel-caption">
                <h2></h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('img/imghome/aweerabanner9.jpg');"></div>
            <div class="carousel-caption">
                <h2></h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('img/imghome/aweerabanner8.jpg');"></div>
            <div class="carousel-caption">
                <h2></h2>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>

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

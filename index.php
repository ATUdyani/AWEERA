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
            <div class="fill" style="background-image:url('img/image2.jpg');"></div>
            <div class="carousel-caption">
                <h2></h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('img/image1.png');"></div>
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
                    <p> Let sensuous hair be yours! You can get various kind of hairstyles for men and women from our excellent hair stylists. We offer, hair cut, hair setting, hair treatments and hair coloring services.    </p>
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
                    <p> You and your bridal party’s hair and makeup will be completed just hours before your wedding. Our professionals will make sure your look holds up and carries you through the rest of your long, exciting day.</p>
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
                    <p>Aweera is considered an upscale full-service beauty salon. We will offer a wide range of services that include: makeup, pedicure, manicure, nail care and other beauty services from our excellent team of beauticians.</p>
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
            <p>For all your Hair and Beauty treatments under one roof for both Ladies and Gents. <br>
                Our Business Services includes:</p>
            <ul>
                <li>Haircut</li>
                <li>Hair setting</li>
                <li>Hair treatments</li>
                <li>Hair color</li>
                <li>Face and Body treatments</li>
                <li>Waxing</li>
                <li>Threading</li>
                <li>Saree Draping</li>
                <li>Makeup</li>
                <li>Pedicure</li>
                <li>Manicure</li>
                <li>Nail care</li>
            </ul>
            <p> "Life is an endless struggle full of frustrations and challenges, but eventually you find a <strong>  hairstylist</strong> who understand you"</p>
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

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; TeamScorp 2017</p>
            </div>
        </div>
    </footer>

</div>

<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img class="img-circle" id="img_logo" src="img/aweera.png">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>

            <!-- Begin # DIV Form -->
            <div id="div-forms" class="my-login-form">

                <!-- Begin # Login Form -->
                <form id="login-form">
                    <div class="modal-body">
                        <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg" class="my-msg"><p>Type your email and password.</p></span>
                        </div>
                        <input id="login_username" class="form-control" type="text" placeholder="Email" required>
                        <input id="login_password" class="form-control" type="password" placeholder="Password" required>
                        <div class="checkbox">
                            <label>
                                <!--                                    <input type="checkbox"> Remember me-->
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block my-lg-button">Login</button>
                        </div>
                        <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                            <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End # Login Form -->

                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-lost-msg">
                            <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-lost-msg" class="my-msg"><p>Type your e-mail.</p></span>
                        </div>
                        <input id="lost_email" class="form-control" type="text" placeholder="E-Mail" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block my-lg-button">Send</button>
                        </div>
                        <div>
                            <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->

                <!-- Begin | Register Form -->
                <form id="register-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-register-msg">
                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-register-msg" class="my-msg"><p>Register an account.</p></span>
                        </div>
                        <input id="first_name" class="form-control" type="text" placeholder="First Name" required>
                        <input id="last_name" class="form-control" type="text" placeholder="Last Name" required>
                        <input id="contact_number" class="form-control" type="text" placeholder="Contact Number" required>
                        <input id="address" class="form-control" type="text" placeholder="Address" required>
                        <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                        <input id="register_password" class="form-control" type="password" placeholder="Password" required>
                        <input id="register_cpassword" class="form-control" type="password" placeholder="Confirm Password" required>
                        <p id="message" style="padding-top:5px;margin-bottom: 0px;"></p>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block my-lg-button">Register</button>
                        </div>
                        <div style="padding-bottom:10px;">
                            <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                        </div>
                    </div>
                </form>
                <!-- End | Register Form -->

            </div>
            <!-- End # DIV Form -->
        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->

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

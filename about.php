<?php require_once('model/Database.php');
$db = new Database();
$db->connect();
?>

<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AWEERA - Bridal, Hair and Beauty</title>

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
                    <a href="#">Appointments</a>
                </li>
                <li class="link-1">
                    <a href="index.php#gallery">Gallery</a>
                </li>
                <li class="link-1">
                    <a href="about.php">About</a>
                </li>
                <li id="contact_menu" class="link-1">
                    <a href="#contact">Contact</a>
                </li>

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
        </div>
    </div>
    <!-- /.navbar-collapse -->
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">About Us
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a>
                </li>
                <li class="active">About Us</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Intro Content -->
    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive" src="img/aboutus.jpg" alt="">
        </div>
        <div class="col-md-6">
            <h2>Aweera - Bridal, Hair & Beauty</h2>
            <p>AWEERA - BRIDAL, HAIR & BEAUTY is one of the most trending salons in the Sri Lankan beauty culture industry with their salon located at. Professional hair stylist Asanka Weerasekara along with his team at AWEERA at all times and at all occasions are prepared to beautify you with their exclusive hair and beauty culture services.</p>
            <p>AWEERA is considered as an upscale full-service beauty salon offering a wide range of services including hair cuts, hair setting, hair treatments, hair coloring, face & body treatments, waxing, threading, saree draping, make-up, pedicure, manicure & nail care. The use of the highest quality cosmetics and their speciality in hair treatments makes them distinctively unique in the industry. While handling your hair firmly and very carefully AWEERA gives an entirely new look to your hair. </p>
            <p>You can now avail yourself with AWEERA at their branch at No. 220, Solomon Peiris Avenue, Mount Lavinia. A visit to AWEERA - BRIDAL, HAIR & BEAUTY will make you fall in love with your hair again and again.</p>

        </div>
    </div>
    <!-- /.row -->

    <!--Founder-->
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Founder</h2>
        </div>
        <div class="col-md-6">
            <p>Asanka Weerasekara, the founder of AWEERA - BRIDAL, HAIR & BEAUTY commenced his journey as a beautician in the year 2008 joining International Academy of Beauticians (Pvt) Ltd. After successfully completing his vocational training at the institution he joined the industry as an assistant to the renowned beautician Dhananjaya Bandara.</p>
            <p>Due to his dedication at work and his magical talent in styling hair, he succeeded in opening up a platform of his own. Accordingly, in 2010 he established AWEERA - BRIDAL, HAIR & BEAUTY making his dream a reality. With his professional speciality in hair styling he was succeeded in building up his own name in the industry and currently he is serves as the official hairdresser for most of the prominent celebrities in Sri Lanka. Asanka Weerasekara also participated in many international as well as national competitions and proved the whole nation that he is capable of bringing up change to the industry.</p>
            <p>If you make a visit to AWEERA - BRIDAL HAIR & BEAUTY, Unlike most of the others in the industry, Asanka would give you an entirely different look while treating your hair with love and care, causing no harm at all to your hair.

        </div>
        <div class="col-lg-3">
            <img class="img-responsive" src="img/asanka1.jpg" alt="" width=100%>
        </div>
        <div class="col-lg-3">
            <img class="img-responsive" src="img/asanka2.jpg" alt="" width=100%>
        </div>
    </div>


    <!-- Team Members -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Team</h2>
        </div>
        <div class="col-md-4 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/asanka.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Asanka Weerasekara</small>
                    </h3>
                    <p>Founder ~ Hair Stylist</p>
                    <p>Contact No. : 0778765937</p>
                    <p>email       : asanka_aweera@gmail.com</p>
                    <ul class="list-inline">
                        <li><a href="https://web.facebook.com/asanka.weerasekara.96"><i class="fa fa-2x fa-facebook-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-md-4 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/Tina1.png" alt="" width=500px height=80%>
                <div class="caption">
                    <h3>Tina Ishani<br>
                        <small>Tina Ishani</small>
                    </h3>
                    <p>Manager</p>
                    <p>Contact No. : 0765463718</p>
                    <p>email       : tinaishani@hotmail.com</p>
                    <ul class="list-inline">
                        <li><a href="https://web.facebook.com/tina.ishani"><i class="fa fa-2x fa-facebook-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/suneth.jpg" alt="">
                <div class="caption">
                    <h3>Suneth Rajapaksha<br>
                        <small>Suneth Rajapaksha</small>
                    </h3>
                    <p>Hair Dresser ~ Make-Up Artist</p>
                    <p>Contact No. : 0717623576</p>
                    <p>email       : sune@gmail.com</p>
                    <ul class="list-inline">
                        <li><a href="https://web.facebook.com/suneth.rajapaksha.94"><i class="fa fa-2x fa-facebook-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/Heshan.png" alt="">
                <div class="caption">
                    <h3>Heshan Fernando<br>
                        <small>Heshan Fernando</small>
                    </h3>
                    <p>Bridal Dressing</p>
                    <p>Contact No. : 0773458762</p>
                    <p>email       : heshanrj@gmail.com</p>
                    <ul class="list-inline">
                        <li><a href="https://web.facebook.com/heshan.fernando.984"><i class="fa fa-2x fa-facebook-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/kalpani.jpg" alt="">
                <div class="caption">
                    <h3>Kalpani Maheshika<br>
                        <small>Kalpani Maheshika</small>
                    </h3>
                    <p>Hair Dresser ~ Make-up Artist</p>
                    <p>Contact No. : 0718703498</p>
                    <p>email       : kalpishika@yahoo.com</p>
                    <ul class="list-inline">
                        <li><a href="https://web.facebook.com/kalpani.maheshika.3"><i class="fa fa-2x fa-facebook-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/rj.png" alt="">
                <div class="caption">
                    <h3>RJ Avishka<br>
                        <small>RJ Avishka</small>
                    </h3>
                    <p>Hair Dresser</p>
                    <p>Contact No. : 0754987162</p>
                    <p>email       : rj_avishka@gmail.com</p>
                    <ul class="list-inline">
                        <li><a href="https://web.facebook.com/avishka.max.16"><i class="fa fa-2x fa-facebook-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->


    <!-- Our Services -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Services</h2>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/color.png" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Hair Coloring</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/setting.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Hair Setting</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/cut.png" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Hair Cuts</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/treatments.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Hair Treatments</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/brading.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Hair Braiding</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/makeup.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Make-Up</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/painting.png" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Face Painting</small>
                    </h3>
                </div>
            </div>
        </div>


        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/bridal.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Bridal Dressing</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/body.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Face & Body Treatments</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/facial.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Skin Care</small>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Customers -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Customers</h2>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive customer-img" src="img/lahiru.jpeg" alt="">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive customer-img" src="img/sanuka.jpg" alt="">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive customer-img" src="img/hemal.png" alt="">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive customer-img" src="img/dasun.png" alt="">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive customer-img" src="img/yureni.png" alt="">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive customer-img" src="img/sanjana.png" alt="">
        </div>
    </div>
    <!-- /.row -->


    <hr>

    <!-- Contact Us Section -->
    <div id="contact" class="row">
        <!-- Map Column -->
        <div class="col-md-8">
            <!-- Embedded Google Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7922.799465866995!2d79.86442985177537!3d6.842588651401578!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe6c7a3bf6e043a48!2sAweera+Hair+%26+Beauty!5e0!3m2!1sen!2slk!4v1500347822377" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h2>Contact Details</h2>
            <br>
            <br>
            <p>
                Hair Care & Beauty Treatments & Dressing by AWEERA<br>
                No. 220,<br>
                Solomon Peiris Avenue,<br>
                Mount Lavinia<br>
            </p>
            <p><i class="fa fa-phone"></i>
                <abbr title="Phone">P</abbr>: 0112727285</p>
            <p><i class="fa fa-envelope-o"></i>
                <abbr title="Email">E</abbr>: <a href="mailto:hairbyaweera@yahoo.com">hairbyaweera@yahoo.com</a>
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

                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block my-lg-button">Register</button>
                        </div>
                        <div>
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
        }, 2000);
    });
</script>

</body>

</html>

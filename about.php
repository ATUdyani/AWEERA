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

<?php include ("view/homepage/home-navbar.php");?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">About Us
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Intro Content -->
    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive" src="img/aboutus/aboutus.jpg" alt="">
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
            <img class="img-responsive" src="img/aboutus/asanka1.jpg" alt="" width=100%>
        </div>
        <div class="col-lg-3">
            <img class="img-responsive" src="img/aboutus/asanka2.jpg" alt="" width=100%>
        </div>
    </div>


    <!-- Team Members -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Team</h2>
        </div>
        <div class="col-md-4 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/aboutus/asanka.jpg" alt="" width=500px height=500px >
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
                <img class="img-responsive" src="img/aboutus/Tina1.png" alt="" width=500px height=80%>
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
                <img class="img-responsive" src="img/aboutus/suneth.jpg" alt="">
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
                <img class="img-responsive" src="img/aboutus/Heshan.png" alt="">
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
                <img class="img-responsive" src="img/aboutus/kalpani.jpg" alt="">
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
                <img class="img-responsive" src="img/aboutus/rj.jpg" alt="">
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
                <img class="img-responsive" src="img/aboutus/haircoloring.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Hair Coloring</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/aboutus/setting.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Hair Setting</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/aboutus/haircuts.jpg" alt="" width=800px height=800px >
                <div class="caption">
                    <h3><br>
                        <small>Hair Cuts</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/aboutus/treatments.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Hair Treatments</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/aboutus/brading.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Hair Braiding</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/aboutus/makeup.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Make-Up</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/aboutus/facepainting.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Face Painting</small>
                    </h3>
                </div>
            </div>
        </div>


        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/aboutus/bridal.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Bridal Dressing</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/aboutus/body.jpg" alt="" width=500px height=500px >
                <div class="caption">
                    <h3><br>
                        <small>Face & Body Treatments</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="img/aboutus/facial.jpg" alt="" width=500px height=500px >
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
            <img class="img-responsive customer-img" src="img/aboutus/lahiru.jpeg" alt="">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive customer-img" src="img/aboutus/sanuka.jpg" alt="">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive customer-img" src="img/aboutus/hemal.png" alt="">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive customer-img" src="img/aboutus/dasun.jpg" alt="">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive customer-img" src="img/aboutus/yureni.png" alt="">
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive customer-img" src="img/aboutus/sanjana.jpg" alt="">
        </div>
    </div>
    <!-- /.row -->


    <hr>

    <?php include ('contact-us.php');?>

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
        }, 2000);
    });
</script>

</body>

</html>

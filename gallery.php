<?php require_once "model/Gallery.php"; ?>

<link rel="stylesheet" href="baguettebox/baguetteBox.min.css">

<?php

/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 02-Dec-17
 * Time: 7:30 PM
 */
$gallery = new Gallery();
$result = $gallery->getImages();
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
            <h1 class="page-header">Gallery</h1>
        </div>

        <div class="tz-gallery">
            <?php
            $image_list ="";
            while($image=mysqli_fetch_assoc($result)){
                $image_list .="<div class=\"col-xs-6 col-sm-4 col-md-3\">
                <a href='img/uploads/".$image['path']."'>
                    <img class=\"img-responsive img-portfolio img-hover my-img\" src='img/uploads/".$image['path']."' alt=\"\">
                </a>
            </div>";
            }
            echo $image_list;
            ?>
        </div>
    </div>
    <!-- /.row -->

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


<script src="baguettebox/baguetteBox.min.js"></script>

<script>
    baguetteBox.run('.tz-gallery');
</script>


</body>

</html>

<?php include ('model/Mirror.php');?>

<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="AWEERA - Hair and Beauty">
    <meta name="author" content="TeamScorp">

    <title>AWEERA - Hair and Beauty</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="css/loginstyle.css" rel="stylesheet">
    <link href="css/mirrorstyle.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

</head>

<div class="my-content">

    <body>

    <?php include ("view/homepage/home-navbar.php");?>


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">AWEERA Mirror
                </h1>
            </div>
        </div>

        <br>
        <!-- /.row -->

            <div class="row mirror-row" >
                <div class="col-md-6">

                    <div id="panel"class="panel panel-default mirror-panel">
                        <div class="panel-body">
                            <canvas id="display" class="mirror-display"></canvas>
                            <img id="mask" src="img/mirror/frame3.png" class="mirror-mask" />
                            <canvas height=360 width=1000 id="photo" class="mirror-photo"></canvas>
                        </div>

                    </div>
                </div>


                <div class="col-md-1 mirror-button">
                        <a role="button" title="capture" class="btn btn-primary btn-lg my-lg-button center-block" id="takePhoto" value="Click"><i class="fa fa-camera" aria-hidden="true"></i></a>
                        <a role="button" title="back" class="btn btn-primary btn-lg my-lg-button center-block" id="takePhoto2" value="Click"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-default thumbnail-panel">
                        <div class="panel-body my-thumbnail" id="jtype">
                            <div id="vritem">
                                <?php
                                $mirror = new Mirror();
                                $result = $mirror ->getMirrorImages();
                                $image_list ="";
                                while($result_set = mysqli_fetch_assoc($result)){
                                    $image_list .= "<div class=\"thumbnail caption1 transthumb text-center\">";
                                    $image_list .= "<a id=\"\" value=\"".$result_set['image']."\" role=\"button\"><img src=\"".$result_set['image']."\"></a>";
                                    $image_list .="</div>";
                                }
                                echo $image_list;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php include ('contact-us.php');?>

        <?php include('footer.php'); ?>

    </div>
    <!-- /.container -->

    <?php include('view/modals/login-modal.php'); ?>
    <?php include('view/modals/message-modal.php'); ?>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- script to handle model login -->
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/mirror_handler.js"></script>
    <script src="js/fabric.min.js"></script>

    <!-- Script to scroll to contact -->
    <script type="text/javascript">
        $("#contact_menu").click(function() {
            $('html, body').animate({
                scrollTop: $("#contact").offset().top
            }, 1000);
        });
    </script>


    </body>

</html>

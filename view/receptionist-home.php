<?php session_start() ?>

<?php require_once('../model/Database.php');
$db = new Database();
$db->connect();
?>

<?php
// checking if an user is logged in
if(!isset($_SESSION['user_id']) || ($_SESSION['type']!="Receptionist")){
    header ('Location: ../index.php');
}
?>

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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/mystyle.css" rel="stylesheet">
    <link href="../css/payments.css" rel="stylesheet">
    <link href="../css/loginstyle.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<div class="my-content">
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
                <a href="../index.php"><img class="img-circle" id="img_logo" src="../img/aweera.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class= "collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav navbar-right my-primary-menu">
                    <li class="link-1">
                        <a href="#">Appointments</a>
                    </li>
                    <li class="link-1">
                        <a href="../index.php#gallery">Gallery</a>
                    </li>
                    <li class="link-1">
                        <a href="../about.php">About</a>
                    </li>
                    <li class="link-1">
                        <a href="../index.php#contact">Contact</a>
                    </li>

                    <li class="menu link-1" id="logout">
                        <div class="logout-content">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-user"></span> 
                                        <strong>Welcome
                                            <?php echo $_SESSION['first_name'] ?>
                                        </strong>
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-login">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <p class="text-center">
                                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <p class="text-left name-tag">
                                                            <?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?>
                                                        </p>
                                                        <p class="text-left small">
                                                            <?php echo $_SESSION['email'] ?>
                                                        </p>
                                                        <p class="text-left">
                                                        <form>
                                                            <input class="btn btn-primary btn-block btn-sm" type="submit" value="Edit Profile" formaction="../model/users.php">
                                                        </form>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="navbar-login navbar-login-session">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p>
                                                        <form>
                                                            <input class="btn btn-danger btn-block" type="submit" value="Log Out" formaction="../controller/logout.php">
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
                    </li>
                </ul>

                <!--<div class="arrow-up"></div>
                <div class="login-form" >
                    <form>
                        <div>
                            <input class="my-login-button" type="submit" value="Edit Profile" formaction="../model/users.php">
                        </div>
                        <div>
                            <input class="my-login-button" type="submit" value="Log Out" formaction="../controller/logout.php">
                        </div>
                    </form>
                </div>
                -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Receptionist Home
                    <small><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <nav class="my-sidebar">
                    <ul class="nav">
                        <li><a href="../view/manage-appoinments.php.php" class="my-sidebar-menu-item">Appoinments</a></li>
                        <li><a href="../view/manage-purchase.php" class="my-sidebar-menu-item">Purchase</a></li>
                        <li><a href="../view/manage-payments.php" class="my-sidebar-menu-item">Payments</a></li>
                        <li><a href="../view/view-stock.php" class="my-sidebar-menu-item">Stock</a></li>
                        <li><a href="../view/view-supplier.php" class="my-sidebar-menu-item">Supplier</a></li>


                        <li><a href="../view/manage-staff.php" class="my-sidebar-menu-item" id=" btnStaff" data-toggle="collapse" data-target="#submenuStaff" aria-expanded="false">Staff</a>
                            <ul class="nav collapse my-sidebar-submenu" id="submenuStaff" role="menu" aria-labelledby="btnStaff">
                                <li><a href="../view/add-staff.php" class="my-sidebar-submenu-item">Add Staff</a></li>
                                <li><a href="#">Update Staff</a></li>
                                <li><a href="#">Delete Staff</a></li>
                            </ul>
                        </li>

                        <li><a href="#" id="btnReports" data-toggle="collapse" data-target="#submenuReports" aria-expanded="false">Reports</a>
                            <ul class="nav collapse my-sidebar-submenu" id="submenuReports" role="menu" aria-labelledby="btnReports">
                                <li><a href="#" class="my-sidebar-submenu-item">Daily Collection</a></li>
                            </ul>
                        </li>

                        <li><a href="../view/manage-service.php" class="my-sidebar-menu-item">Service</a></li>

                    </ul>
                </nav>
            </div>

            <!-- Content Column -->
            <div id="content" class="col-md-9 loaded-content">
                <h2>My Profile</h2>
                <p></p>
            </div>
        </div>
        <!-- /.row -->

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
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/loader.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Script to display and hide login form -->
    <!--<script type="text/javascript">
        $(document).ready(function(){
            var arrow = $(".arrow-up");
            var form = $(".login-form");
            var status = false;
            $("#logout").click(function(event){
                event.preventDefault();
                if(status==false){
                    arrow.fadeIn();
                    form.fadeIn();
                    status = true;
                }
                else{
                    arrow.fadeOut();
                    form.fadeOut();
                    status = false;
                }
            })
        })
    </script>-->

    </body>
</div>
</html>

<?php session_start() ?>

<?php require_once('../model/Database.php');

$db = new Database();
$db->connect();
?>

<?php require_once('../model/Service.php'); ?>
<?php require_once('../model/Beautician.php'); ?>

<?php
// checking if an user is logged in
if(!isset($_SESSION['user_id'])){
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
    <link href="../css/loginstyle.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/appointment.js"></script>
    <script type="text/javascript" src="../js/customer_functions.js"></script>


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
                        <a href="#">Gallery</a>
                    </li>
                    <li class="link-1">
                        <a href="../about.php">About</a>
                    </li>
                    <li class="link-1">
                        <a href="#contact">Contact</a>
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
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Beautician Home
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
                        <li><a href="#" onclick="window.location.reload()" class="my-sidebar-menu-item">Today's Schedule</a></li>
                        <li><a href="beautician/beautician-upcoming-appointments.php" class="my-sidebar-menu-item">Upcoming Appointments</a></li>
                        <li><a href="beautician/beautician-appointment-history.php" class="my-sidebar-menu-item">Appointment History</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Content Column -->
            <div id="content" class="col-md-9 loaded-content">
                <h2>Today's Schedule - <?php echo date("Y-m-d");?></h2>
                <br>

                <!-- Content Row -->
                <div class="row">
                    <div class="col-md-12 result-table" id="result">
                        <?php
                        // create an object from Appointment class
                        $beautician = new Beautician();
                        $appointment_list = $beautician->viewAppointments($_SESSION['user_reg_id'],date("Y-m-d"));
                        echo $appointment_list;
                        ?>
                    </div>
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
    <!-- /.container -->

    <?php include('modals/message-modal.php'); ?>

        <script type="text/javascript" src="../js/loader.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>






    </body>

</html>

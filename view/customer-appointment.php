<?php session_start() ?>

<?php require_once('../model/Database.php');

$db = new Database();
$db->connect();
?>

<?php require_once('../model/Service.php'); ?>

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

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Book an Appointment
                    <small><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?></small>
                </h1>
            </div>
        </div>

        <br>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4">
                        <label><h4>What are you looking for?</h4></p></label>
                    </div>
                    <div class="col-md-4">
                        <input type="hidden" id="cust_id" name="cust_id" value="<?php echo $_SESSION['user_reg_id']; ?>">
                        <select name="select_service_type" id="select_service_type" class="form-control" onchange="loadServiceNames(this.value)">
                            <option value="">Select a Service</option>
                            <?php
                                $service = new Service();
                                echo $service->viewAllServiceTypes();
                            ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select name="select_service_name" id="select_service_name" class="form-control" onchange="loadBeauticianNames(this.value)" disabled="disabled">
                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-4">
                        <label><h4>With whom? (Select Stylist)</h4></p></label>
                    </div>
                    <div class="col-md-4">
                        <select name="select_beautician_name" id="select_beautician_name" class="form-control" disabled="disabled" onchange="enableCalender()">
                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-4">
                        <label><h4>When?</h4></p></label>
                    </div>
                    <div class="col-md-4">
                        <form>
                            <input type="date" name="appointment_date" id="appointment_date" class="form-control" disabled="disabled" onchange="loadSlots()">
                        </form>
                    </div>
                    <div class="col-md-4">
                        <select name="time_slots" id="time_slots" class="form-control" disabled="disabled">
                        </select>
                    </div>
                </div>

                <br>
                <br>
                <br>

                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <a class="btn btn-lg btn-default btn-block" onclick="makeAppointment()">Make Appointment</a>
                        </div>
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


    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>




    </body>

</html>

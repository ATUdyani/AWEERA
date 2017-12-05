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


<script type="text/javascript" src="../js/receptionist_functions.js"></script>

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

    <?php include ("homepage/navbar-with-logout.php");?>


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Receptionist Home
                    <small><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?></small>
                    <div class="request-icon">
                        <span role="button" class="badge badge-pill badge-info" id="request_count" onclick="displayRegisterRequests()"></span>
                        <i role="button" class="fa fa-envelope-o envelop" aria-hidden="true" onclick="displayRegisterRequests()"></i>
                    </div>

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
                        <li><a id="menudefault" href="manage-appointments.php" class="my-sidebar-menu-item">Appointments</a></li>
                        <li>
                            <a href="manage-comments.php" class="my-sidebar-menu-item">Comments
                                  <span class="badge badge-pill badge-info" id="comment_count"></span>
                            </a>
                        </li>
                        <li><a href="../view/manage-purchase.php" class="my-sidebar-menu-item">Purchase</a></li>
                        <li><a href="../view/manage-payments.php" class="my-sidebar-menu-item">Payments</a></li>
                        <li><a href="../view/view-stock.php" class="my-sidebar-menu-item">Stock</a></li>
                        <li><a href="../view/manage-supplier.php" class="my-sidebar-menu-item">Supplier</a></li>


                        <li><a href="../view/manage-staff.php" class="my-sidebar-menu-item" id=" btnStaff" data-toggle="collapse" data-target="#submenuStaff" aria-expanded="false">Staff</a></li>

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
                <div>
                    <p>Enter Appointment Number : </p>
                    <input type="text" id="app_id" name="app_id">
                    <button type="button" onclick="sendTestCommentEmail()">Send Email</button>
                </div>

                <p></p>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <?php include('../footer.php'); ?>

    </div>
    <!-- /.container -->


    <?php include('modals/select-customer-modal.php'); ?>
    <?php include('modals/message-modal.php'); ?>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/loader.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script>
        $( document ).ready(function() {
            $('#content').load('manage-appointments.php');
        });
    </script>

    </body>
</div>
</html>

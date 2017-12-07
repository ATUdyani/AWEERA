
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
    <script type="text/javascript" src="../js/appointment.js"></script>

</head>

<div class="my-content">

    <body>

    <?php include ("view/homepage/home-navbar.php");?>


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Comment and Review
                </h1>
            </div>
        </div>

        <br>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="row">
                        <h4>Appointment Date : <?php echo $_GET['appointment_date']?></h4>
                </div>

                <div class="row">
                    <h4>Appointment Time : From <?php echo $_GET['start_time']?>h To <?php echo $_GET['end_time']?>h</h4>
                </div>

                <div class="row">
                    <h4>Service : <?php echo $_GET['service_name']?></h4>
                </div>

                <div class="row">
                    <h4>Beautician : <?php echo $_GET['first_name']?> <?php echo $_GET['last_name']?></h4>
                </div>

            </div>

            <div class="col-md-6 text-center">
                <div class="row">
                    <div class="">
                        <label><h4>Your Comment Here : <small><?php echo $_GET['appointment_id']?></small></h4></label>
                        <input type="hidden" value="<?php echo $_GET['appointment_id']?>" id="appointment_id" name="appointment_id">
                    </div>
                </div>

                <div class="row">
                    <!--<input type="hidden" id="cust_id" name="cust_id" value="<?php /*echo $_SESSION['user_reg_id']; */?>">-->
                    <textarea id="comment" name="comment" cols="50" rows="10" required="required"></textarea>
                </div>

                <br>

                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <a class="btn btn-lg btn-default btn-block" onclick="submitComment()">Submit</a>
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

    <?php include('view/modals/login-modal.php'); ?>
    <?php include('view/modals/message-modal.php'); ?>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- script to handle model login -->
    <script type="text/javascript" src="js/login.js"></script>

    <script>
        function  submitComment() {
            var appointment_id = document.getElementById("appointment_id").value;
            var comment = document.getElementById("comment").value;
            var formArray = [];
            formArray.push(appointment_id,comment.trim());
            var jsonString = JSON.stringify(formArray);
            $.ajax({
                url:'controller/submit-comment-handler.php',
                type: "POST", //request type
                data: {data : jsonString},
                cache: false,
                success:function(result){
                    $('#msg_Modal').modal('show');
                    $('#msg_result').html(result);
                }
            });

            $('#msg_Modal').on('hidden.bs.modal', function () {
                window.location.href = "index.php";
            });
        }
    </script>


    </body>

</html>

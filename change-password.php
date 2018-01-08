
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

</head>

<div class="my-content">

    <body>

    <?php include ("view/homepage/home-navbar.php");?>


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Change Passsword
                </h1>
            </div>
        </div>

        <br>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row" >
            <div class="form-group row col-md-6" style="float: none; margin: 0 auto; margin-bottom: 2%;">
                <label for="example-text-input" class="col-md-4 col-form-label top-buffer">New Password</label>
                <div class="col-md-8">
                    <input class="form-control" type="password" name="add_password" id="add_password" maxlength="50" required="" placeholder="Type new password">
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="form-group row col-md-6" style="float: none; margin: 0 auto; margin-bottom: 2%;">
                <label for="example-text-input" class="col-md-4 col-form-label top-buffer">Confirm New Password</label>
                <div class="col-md-8">
                    <input class="form-control" type="password" name="add_confirm_password" id="add_confirm_password" maxlength="50" required="" placeholder="Confirm the password">
                </div>
                <p id="message" class="col-md-8 top-buffer">
                    <br>
                </p>
            </div>
        </div>


        <div class="row">
            <div class="form-group row col-md-2" style="float: none; margin: 0 auto;">
                <input type="hidden" name="add_user_id" id="add_user_id" value="<?php echo $_GET['user_reg_id'];?>" />
                <input type="button" onclick="onclickChangePassword()" name="add" id="add" value="Change" class="btn btn-success my-lg-button" />
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
        // matching password
        $('#add_confirm_password').on('keyup', function () {
            if($(this).val() == ' '){
                $('#message').html("");
            }
            if ($(this).val() == $('#add_password').val()) {
                $('#message').html('Password Match').css('color', 'green');
            }
            else {
                $('#message').html('Password does not match. Please Re-Enter!').css('color', 'red');

            }
        });

        // change user password
        function onclickChangePassword() {
            var newPassword = document.getElementById("add_password").value;
            var confirmNewPassword = document.getElementById("add_confirm_password").value;

            if (newPassword != confirmNewPassword){
                $('#add_password').val('');
                $('#add_confirm_password').val('');
                $('#msg_Modal').modal('show');
                $('#msg_result').html("<h4>New password mismatched</h4>");
                return;
            }

            var formArray = [];
            formArray.push(document.getElementById("add_user_id").value);
            formArray.push(newPassword);
            var jsonString = JSON.stringify(formArray);
            $.ajax({
                url: "controller/change-password-link-handler.php", //the page containing php script
                type: "POST", //request type
                data: {data: jsonString},
                cache: false,
                success: function (data) {
                    $('#msg_Modal').modal('show');
                    $('#msg_result').html(data);
                }
            });

            $('#msg_Modal').on('hidden.bs.modal', function () {
                window.location.href = "index.php";
            });
        }
    </script>


    </body>

</html>

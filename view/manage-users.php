<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/User.php') ?>


<!-- jQuery -->
<script type="text/javascript" src="../js/check_form.js"></script>

<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/loader.js"></script>

<script type="text/javascript" src="../js/search_filter_change.js"></script>

<script>
    // load suitable results on keyup
    $(document).ready(function(){
        $('#search_text').keyup(function () {
            var dataArray =[];
            var filter = document.getElementById("search_param").value;
            var txt = $(this).val();
            dataArray.push(filter);
            dataArray.push(txt);
            var jsonString = JSON.stringify(dataArray);
            if (txt != ''){
                $.ajax({
                    url: "../controller/search-employee-user-handler.php",
                    method: "post",
                    data:{data:jsonString},
                    cache: false,
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
            else{
                //$('#result').html('');
                $.ajax({
                    url: "../controller/search-employee-user-handler.php",
                    method: "post",
                    data:{data:jsonString},
                    cache: false,
                    success: function (data) {
                       $('#result').html(data);
                    }
                });
            }
        });
    });

    // load modal change password
    $(document).ready(function (){
        $(document).on('click','.change_password',function(){
            var user_id = $(this).attr("id");
            $.ajax({
                url:"../controller/fetch-user-handler.php",
                method: "post",
                data: {user_id:user_id},
                dataType: "json",
                cache: false,
                success:function (data) {
                    $('#add_first_name').val(data.first_name);
                    $('#add_last_name').val(data.last_name);
                    $('#add_emp_email').val(data.email);
                    $('#add_emp_type').val(data.type);
                    $('#add_password').val("");
                    $('#add_confirm_password').val("");
                    $('#message').html("");
                    $('#add_emp_id').val(data.id);
                    jQuery.noConflict();
                    $('#change_password_Modal').modal('show');
                }
            });
        });
    });

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

</script>

<h2>Manage Users</h2>

<!--<ul class="nav nav-tabs" id="myTab" role="tablist">-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link active" data-toggle="tab" href="#view-details" role="tab" aria-controls="view-details">View Details</a>-->
<!--    </li>-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link" data-toggle="tab" href="#add-user" role="tab" aria-controls="add-user">Add User</a>-->
<!--    </li>-->
<!--</ul>-->
<!---->
<!--<div class="tab-content">-->
<!--    <div class="tab-pane fade active" id="view-details" role="tabpanel">-->

<div class="row ">
    <div class="col-md-12">
        <div class="input-group my-search-panel">
            <div class="input-group-btn search-panel">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span id="search_concept">Filter by</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" id="filter_select">
                    <li><a href="#first_name" value="first_name">First Name</a></li>
                    <li><a href="#last_name" value="last_name">Last Name</a></li>
                    <li><a href="#email" value="email">Email</a></li>
                    <li><a href="#last_login" value="last_login">Last Login</a></li>
                    <li><a href="#type" value="type">Type</a></li>
                    <li class="divider"></li>
                    <li><a href="#all" value="all">Anything</a></li>
                </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control" name="x" placeholder="Search user here..." id="search_text">
        </div>

        <div class="row">
            <div class="col-md-12 result-table" id="result">
                <?php
                // create an object from user class
                $user= new User();
                $user_list = $user->searchUserDetails("*","");
                echo $user_list;
                ?>
            </div>
        </div>
    </div>
</div>


<!-- model change -->
<div id="change_password_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Change Password</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="add_first_name" id="add_first_name" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="add_last_name" id="add_last_name" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Type</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="add_type" id="add_emp_type" maxlength="50" disabled="disabled" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Email/Username</label>
                        <div class="col-md-8">
                            <input class="form-control" type="email"  id="add_emp_email" name="add_emp_email" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Password</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="add_password" id="add_password" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Confirm Password</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="add_confirm_password" id="add_confirm_password" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label clearfix"></label>
                        <div class="col-md-8">
                            <p id="message" style="padding-top:5px;margin-bottom: 0px;"></p>
                        </div>
                    </div>

                    <div class="col-md-offset-10">
                        <input type="hidden" name="add_emp_id" id="add_emp_id" />
                        <input type="button" onclick="onclickChangePassword()" name="add" id="add" value="Change" class="btn btn-success my-lg-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- model to display dialog -->
<div id="msg_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Message</h3>
            </div>
            <div class="modal-body">
                <div id="msg_result">

                </div>
            </div>
        </div>
    </div>
</div>

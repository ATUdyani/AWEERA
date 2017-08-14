<?php session_start(); ?>
<?php require_once('../model/database.php') ?>
<?php require_once('../model/user.php') ?>

<!-- to change the filter when clicked -->
<script>
    $(document).ready(function(e){
        $('.search-panel .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
        });
    });

    // load all data on page ready
    $(document).ready(function(){
        var dataArray = ["*"," "];
        var jsonString = JSON.stringify(dataArray);
        $.ajax({
            url: "../controller/search-employee-user-handler.php",
            method: "post",
            data:{data:jsonString},
            success: function (data) {
                $('#result').html(data);
            }
        });
    });

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
                    success: function (data) {
                       $('#result').html(data);
                    }
                });
            }
        });
    });

</script>

<h2>Manage Users</h2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#view-details" role="tab" aria-controls="view-details">View Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-user" role="tab" aria-controls="add-user">Add User</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade active" id="view-details" role="tabpanel">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Type</th>
                <th>Last Login</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // create an oblject from user class
            $user= new User();
            $user_list = $user->loadUsers();
            echo $user_list;
            ?>
            </tbody>
        </table>
    </div>


    <div class="tab-pane fade" id="add-user" role="tabpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">Filter by</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" id="filter_select">
                            <li><a href="#emp_id" value="emp_id">ID</a></li>
                            <li><a href="#first_name" value="first_name">First Name</a></li>
                            <li><a href="#last_name" value="last_name">Last Name</a></li>
                            <li><a href="#emp_email" value="emp_email">Email</a></li>
                            <li><a href="#emp_phone" value="emp_phone">Phone</a></li>
                            <li><a href="#emp_address" value="emp_address">Address</a></li>
                            <li><a href="#emp_type" value="emp_type">Type</a></li>
                            <li><a href="#emp_gender" value="emp_gender">Gender</a></li>
                            <li class="divider"></li>
                            <li><a href="#all" value="all">Anything</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="x" placeholder="Search employee here..." id="search_text">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" id="result">

            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


</div>

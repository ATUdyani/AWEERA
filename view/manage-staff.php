<?php session_start(); ?>
<?php require_once('../model/database.php') ?>
<?php require_once('../model/employee.php') ?>
<?php require_once('../model/service.php') ?>

<!-- jQuery -->
<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/loader.js"></script>

<script type="text/javascript" src="../js/check_form.js"></script>


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
            url: "../controller/search-employee-handler.php",
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
                    url: "../controller/search-employee-handler.php",
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
                    url: "../controller/search-employee-handler.php",
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

<h2>Manage Staff</h2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#view-details" role="tab" aria-controls="view-details">View Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-admin" role="tab" aria-controls="add-admin">Add Administrator</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-recep" role="tab" aria-controls="add-recep">Add Receptionist</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add-beautician" role="tab" aria-controls="add-beautician">Add Beautician</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade active" id="view-details" role="tabpanel">
        <div class="row ">
            <div class="col-md-12">
                <div class="input-group my-search-panel">
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

            <div class="row">
                <div class="col-md-12 result-table" id="result">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Type</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // create an object from Employee class
                        $employee = new Employee();
                        $employee_list = $employee->loadEmployeeDetails();
                        echo $employee_list;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="tab-pane fade" id="add-admin" role="tabpanel">

        <div class="form-errors disabled">
            <p id="msg_admin"></p>
        </div>


        <form class="userform" method="post" id="admin_form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="first_name_admin" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="last_name_admin" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <form>
                    <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                        <div class="col-md-8">
                            <input id="male_radio_button" name="gender_admin" type="radio" name="optradio" value="Male" checked="">Male
                        </div>
                        <div class="col-md-8">
                            <input id="female_radio_button" name="gender_admin" type="radio" name="optradio" value="Female">Female
                        </div>
                </form>
            </div>

            <div class="form-group row">
                <label for="example-email-input" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-8">
                    <input class="form-control" type="email"  id="emp_email_admin" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                <div class="col-md-8">
                    <input class="form-control" type="tel" id="emp_phone_admin" maxlength="10">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-8">
                    <textarea class="form-control" type="text" rows="5" id="emp_address_admin" maxlength="60"></textarea>
                </div>
            </div>

            <div>
                <button name="clear" type="button" class="btn btn-primary col-md-1 my-button-action">Clear</button>
                <button name="submit" id="emp_type_button_admin" onclick="checkFormAdmin()" type="button" value="Administrator" class="btn btn-primary col-md-1" method="post">Save</button>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="add-recep" role="tabpanel">
        <div class="form-errors">
            <p id="msg_receptionist"></p>
        </div>


        <form class="userform" method="post" id="receptionist_form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="first_name_receptionist" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="last_name_receptionist" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <form>
                    <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                    <div class="col-md-8">
                        <input id="male_radio_button" name="gender_receptionist" type="radio" name="optradio" value="Male" checked="">Male
                    </div>
                    <div class="col-md-8">
                        <input id="female_radio_button" name="gender_receptionist" type="radio" name="optradio" value="Female">Female
                    </div>
                </form>
            </div>

            <div class="form-group row">
                <label for="example-email-input" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-8">
                    <input class="form-control" type="email"  id="emp_email_receptionist" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                <div class="col-md-8">
                    <input class="form-control" type="tel" id="emp_phone_receptionist" maxlength="10">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-8">
                    <textarea class="form-control" type="text" rows="5" id="emp_address_receptionist" maxlength="60"></textarea>
                </div>
            </div>

            <div>
                <button name="clear" type="button" class="btn btn-primary col-md-1 my-button-action">Clear</button>
                <button name="submit" id="emp_type_button_receptionist" onclick="checkFormReceptionist()" type="button" value="Receptionist" class="btn btn-primary col-md-1" method="post">Save</button>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="add-beautician" role="tabpanel">

        <div class="form-errors">
            <p id="msg_beautician"></p>
        </div>


        <form class="userform" method="post" id="receptionist_form">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="first_name_beautician" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                <div class="col-md-8">
                    <input class="form-control" type="text"  id="last_name_beautician" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <form>
                    <label for="example-text-input" class="col-md-4 col-form-label clearfix">Gender</label>
                    <div class="col-md-8">
                        <input id="male_radio_button" name="gender_beautician" type="radio" name="optradio" value="Male" checked="">Male
                    </div>
                    <div class="col-md-8">
                        <input id="female_radio_button" name="gender_beautician" type="radio" name="optradio" value="Female">Female
                    </div>
                </form>
            </div>

            <div class="form-group row">
                <label for="example-email-input" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-8">
                    <input class="form-control" type="email"  id="emp_email_beautician" maxlength="50">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-tel-input" class="col-md-4 col-form-label">Phone Number</label>
                <div class="col-md-8">
                    <input class="form-control" type="tel" id="emp_phone_beautician" maxlength="10">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-8">
                    <textarea class="form-control" type="text" rows="5" id="emp_address_beautician" maxlength="60"></textarea>
                </div>
            </div>



            <div class="form-group row">
                <label class="col-md-4 col-form-label">Beautician Type</label>
                <div class="form-check col-md-8">
                    <?php
                    // create an object from Service class
                    $service= new Service();
                    $service_list = $service->loadServiceNames();
                    echo $service_list;
                    ?>
                </div>
            </div>

            <div>
                <button name="clear" type="button" class="btn btn-primary col-md-1 my-button-action">Clear</button>
                <button name="submit" id="emp_type_button_beautician" onclick="checkFormBeautician()" type="button" value="Beautician" class="btn btn-primary col-md-1" method="post">Save</button>
            </div>
        </form>

    </div>
</div>

<script>
    $(function () {
        $('#myTab a:last').tab('show')
    });
</script>

